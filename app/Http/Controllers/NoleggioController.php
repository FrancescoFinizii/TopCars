<?php

namespace App\Http\Controllers;

use App\Models\Noleggio;
use App\Models\Auto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Gate;

class NoleggioController extends Controller
{

    /**
     * Mostra al cliente la pagina con i dettagli del noleggio
     */
    public function show() {
        $noleggio = Noleggio::where("clienteID", Auth::user()->utenteable->id)->where("attivo", true)->first();
        return view("cliente.cliente-noleggio", ["noleggio" => $noleggio]);
    }


    /**
     * Salva un nuovo noleggio nel database
     */
    public function store(Request $request)
    {
        if (Gate::allows("doesntHaveNoleggio")) {
            $request->id = Crypt::decrypt($request->id);
            $request->dataRitiro = Crypt::decrypt($request->dataRitiro);
            $request->localitaRitiro = Crypt::decrypt($request->localitaRitiro);
            $request->oraRitiro = Crypt::decrypt($request->oraRitiro);
            $request->dataConsegna = Crypt::decrypt($request->dataConsegna);
            $request->localitaConsegna = Crypt::decrypt($request->localitaConsegna);
            $request->oraConsegna = Crypt::decrypt($request->oraConsegna);

            $auto = Auto::find($request->id);
            $importo = $auto->costoGiornaliero *  date_diff(date_create($request->dataRitiro), date_create($request->dataConsegna))->days;

            $auto->noleggio()->create([
                "clienteID" => Auth::user()->utenteable->id,
                "dataRitiro" => $request->dataRitiro,
                "localitàRitiro" => $request->localitaRitiro,
                "oraRitiro" => $request->oraRitiro,
                "dataConsegna" => $request->dataConsegna,
                "localitàConsegna" => $request->localitaConsegna,
                "oraConsegna" => $request->oraConsegna,
                "importo" => $importo,
                "attivo" => true
            ]);

            return redirect()->route("catalogo")->with("success", "Prenotazione effettuata con successo!");
        }
        else {
            return redirect()->route("catalogo")->withErrors("error", "Prenotazione impossibile");
        }

    }


    /**
     * Mostra l'elenco dei noleggi dell'anno corrente
     */
    public function showNoleggiFromYear()
    {
        return view("staff.noleggio-index", ["noleggi" => Noleggio::all()]);
    }


    /**
     * Restituisce l'elenco dei noleggi dell'anno corrente e del mese selezionato presenti nel database
     */
    public function getNoleggiFromMonth($month) {
        $year = Carbon::today()->year;
        $startDate =Carbon::parse($year . "-" . $month)->startOfMonth()->format("Y-m-d");
        $endDate =Carbon::parse($year . "-" . $month)->endOfMonth()->format("Y-m-d");

        return Noleggio::whereBetween("dataRitiro", [$startDate, $endDate])->orWhereBetween("dataConsegna", [$startDate, $endDate])
            ->orWhere(function($query) use ($endDate, $startDate) {
                $query->where("dataRitiro", "<", $startDate)->where("dataConsegna", ">", $endDate);
            })->get();
    }


    /**
     * Mostra l'elenco dei noleggi dell'anno corrente e del mese selezionato
     */
    public function showNoleggiFromMonth(Request $request)
    {
        $request->validate([
            "mese" => "required|integer|min:0|max:12",
        ]);

        if ($request->mese == 0) {
            $this->showNoleggiFromYear();
        }
        else {
            $noleggi = $this->getNoleggiFromMonth($request->mese);
        }

        return view("staff.noleggio-index", ["noleggi" => $noleggi]);
    }


    /**
     * Mostra la pagina in cui viene indicato il numero complessivo di noleggi per ciascun mese dell'anno corrente
     */
    public function getStatistiche() {
        $array = [];
        for ($month =1; $month<=12; $month++) {
            $array[$month-1] = count($this->getNoleggiFromMonth($month));
        }
        return  view("admin.statistiche", ["value" => $array]);
    }

}
