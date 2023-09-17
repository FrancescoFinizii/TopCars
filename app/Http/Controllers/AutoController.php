<?php

namespace App\Http\Controllers;


use App\Models\Auto;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class AutoController extends Controller
{

    /**
     * Mostra l'elenco delle auto presenti nel database
     */
    public function index()
    {
        return view("staff.auto-index", ["veicoli" => Auto::paginate(10)]);
    }


    /**
     * Mostra il form per creare una nuova auto
     */
    public function create()
    {
        return view("staff.auto-create");
    }


    /**
     * Salva una nuova auto nel database
     */
    public function store(Request $request)
    {
        $request->validate([
            'targa' => 'required|regex:/[A-Z]{2}\d{3}[A-Z]{2}/|size:7|unique:auto,targa',
            'modello' => 'required|max:100',
            'marca' => 'required|max:30',
            'motore' => ['required', Rule::in(["Benzina", "Diesel", "GPL", "Metano", "Ibrida", "Elettrica", "Idrogeno"])],
            'cambio' => ['required', Rule::in(["Automatico", "Meccanico", "Sequenziale"])],
            'bagaglio' => 'required|min:0|lt:10000',
            'porte' => ['required', Rule::in(["2", "3", "4", "5"])],
            'posti' => ['required', Rule::in(["2", "3", "4", "5", "6", "7", "8", "9"])],
            'autonomia' => 'required|gt:0|lt:5000|decimal:0,2',
            'colore' => 'required|max:30',
            'foto' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'descrizione' => 'nullable',
            'emissione' => 'required|date|after: -1 day|before: +1 years|size:10',
            'scadenza' => 'required|date|after:emissione|before: +3 years|size:10',
            'costoGiornaliero' => 'required|decimal:0,2|gt:0|lt:10000',
        ]);

        $auto = Auto::create($request->except("foto"));
        $foto = StorageController::storeImage($request->file("foto"), $auto->id, "auto");
        $auto->update(["foto" => $foto]);

        return redirect()->route("auto.index");
    }


    /**
     * Mostra la pagina con i dettagli dell'auto
     */
    public function show($id)
    {
        $auto = Auto::findOrFail($id);
        return view("public/auto-show", ["auto" => $auto]);
    }


    /**
     * Mostra il form per modificare l'auto
     */
    public function edit(Auto $auto)
    {
        return view("staff.auto-edit", ["auto" => $auto]);
    }


    /**
     * Aggiorna l'auto sul database con i dati inviati
     */
    public function update(Request $request, Auto $auto)
    {
        $request->validate([
            'targa' => ['required', 'regex:/[A-Z]{2}\d{3}[A-Z]{2}/', 'size:7', Rule::unique("auto", "targa")->ignore($auto)],
            'modello' => 'required|max:100',
            'marca' => 'required|max:30',
            'motore' => ['required', Rule::in(["Benzina", "Diesel", "GPL", "Metano", "Ibrida", "Elettrica", "Idrogeno"])],
            'cambio' => ['required', Rule::in(["Automatico", "Meccanico", "Sequenziale"])],
            'bagaglio' => 'required|min:0|lt:10000',
            'porte' => ['required', Rule::in(["2", "3", "4", "5"])],
            'posti' => ['required', Rule::in(["2", "3", "4", "5", "6", "7", "8", "9"])],
            'autonomia' => 'required|gt:0|lt:5000|decimal:0,2',
            'colore' => 'required|max:30',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'descrizione' => 'nullable',
            'costoGiornaliero' => 'required|decimal:0,2|gt:0|lt:10000',
        ]);

        if ($request->emissione != $auto->emissione or $request->scadenza != $auto->scadenza) {
            $request->validate([
                'emissione' => 'date|after: -1 day|before: +1 years|size:10',
                'scadenza' => 'date|after:emissione|before: +3 years|size:10',
            ]);
        }

        $auto->update($request->except("foto"));

        if ($request->hasFile("foto")) {
            $foto = StorageController::updateImage($request->file("foto"), $auto->id, "auto");
            $auto->update(["foto" => $foto]);
        }

        return redirect()->route("auto.index");
    }


    /**
     * Elimina l'auto dal database
     */
    public function destroy(Auto $auto)
    {
        StorageController::findAndDeleteImage($auto->id, "auto");
        $auto->delete();
        return redirect()->route("auto.index");
    }


    /**
     * Ricerca le auto che soddisfano i parametri specificati
     */
    public function search(Request $request)
    {

        $request->validate([
            'priceMin' => 'nullable|integer|min:0|max:4950',
            'priceMax' => 'nullable|integer|min:50|max:5000',
            'posti' => ['nullable', Rule::in(["2", "3", "4", "5", "6", "7", "8", "9"])],
        ]);

        if ($request->has("dataRitiro") or $request->has("dataConsegna")) {
            $request->validate([
                'dataRitiro' => 'required|date|after:today|before: +1 years|size:10',
                'dataConsegna' => 'required|date|after:dataRitiro|before: +3 years|size:10',
                "oraRitiro" => Rule::in(["08:00", "08:30", "09:00", "09:30", "10:00", "10:30", "11:00", "11:30", "12:00", "12:30", "13:00", "13:30", "14:00", "14:30", "15:00", "15:30", "16:00", "16:30", "17:00", "17:30", "18:00", "18:30"]),
                "oraConsegna" => Rule::in(["08:00", "08:30", "09:00", "09:30", "10:00", "10:30", "11:00", "11:30", "12:00", "12:30", "13:00", "13:30", "14:00", "14:30", "15:00", "15:30", "16:00", "16:30", "17:00", "17:30", "18:00", "18:30"]),
                'localitaRitiro' => Rule::in(["Aeroporto di Alghero-Fertilia",
                                              "Aeroporto di Ancona-Falconara",
                                              "Aeroporto di Bari-Palese",
                                              "Aeroporto Bergamo-Orio al Serio",
                                              "Aeroporto di Bologna",
                                              "Aeroporto di Brescia-Montichiari",
                                              "Aeroporto di Brindisi-Casale",
                                              "Aeroporto di Cagliari-Elmas",
                                              "Aeroporto di Catania-Fontanarossa",
                                              "Aeroporto di Firenze-Peretola",
                                              "Aeroporto di Genova-Sestri",
                                              "Aeroporto di Lamezia Terme",
                                              "Aeroporto di Lampedusa",
                                              "Aeroporto di Milano-Malpensa",
                                              "Aeroporto di Milano-Linate",
                                              "Aeroporto di Napoli-Capodichino",
                                              "Aeroporto di Olbia-Costa Smeralda",
                                              "Aeroporto di Palermo-Punta Raisi",
                                              "Aeroporto di Parma",
                                              "Aeroporto di Pescara",
                                              "Aeroporto di Pisa-San Giusto",
                                              "Aeroporto di Reggio Calabria",
                                              "Aeroporto di Rimini",
                                              "Aeroporto di Roma-Fiumicino",
                                              "Aeroporto di Roma-Ciampino",
                                              "Aeroporto di Taranto-Grottaglie",
                                              "Aeroporto di Torino-Caselle",
                                              "Aeroporto di Trapani-Birgi",
                                              "Aeroporto di Trieste-Ronchi dei Legionari",
                                              "Aeroporto di Venezia-Marco Polo",
                                              "Aeroporto di Verona-Villafranca"]),
                'localitaConsegna' => Rule::in(["Aeroporto di Alghero-Fertilia",
                                                "Aeroporto di Ancona-Falconara",
                                                "Aeroporto di Bari-Palese",
                                                "Aeroporto Bergamo-Orio al Serio",
                                                "Aeroporto di Bologna",
                                                "Aeroporto di Brescia-Montichiari",
                                                "Aeroporto di Brindisi-Casale",
                                                "Aeroporto di Cagliari-Elmas",
                                                "Aeroporto di Catania-Fontanarossa",
                                                "Aeroporto di Firenze-Peretola",
                                                "Aeroporto di Genova-Sestri",
                                                "Aeroporto di Lamezia Terme",
                                                "Aeroporto di Lampedusa",
                                                "Aeroporto di Milano-Malpensa",
                                                "Aeroporto di Milano-Linate",
                                                "Aeroporto di Napoli-Capodichino",
                                                "Aeroporto di Olbia-Costa Smeralda",
                                                "Aeroporto di Palermo-Punta Raisi",
                                                "Aeroporto di Parma",
                                                "Aeroporto di Pescara",
                                                "Aeroporto di Pisa-San Giusto",
                                                "Aeroporto di Reggio Calabria",
                                                "Aeroporto di Rimini",
                                                "Aeroporto di Roma-Fiumicino",
                                                "Aeroporto di Roma-Ciampino",
                                                "Aeroporto di Taranto-Grottaglie",
                                                "Aeroporto di Torino-Caselle",
                                                "Aeroporto di Trapani-Birgi",
                                                "Aeroporto di Trieste-Ronchi dei Legionari",
                                                "Aeroporto di Venezia-Marco Polo",
                                                "Aeroporto di Verona-Villafranca"]),
            ]);
        }


        if ($request->filled("search") or $request->filled("priceMin") or $request->filled("priceMax") or $request->filled("posti")) {
            $result =
                Auto::whereBetween("costoGiornaliero", [$request->priceMin, $request->priceMax])

                    ->when($request->filled("search"), function ($q) use ($request) {
                        $q->where(function ($query) use ($request) {
                            $query->where('modello', 'LIKE', "%$request->search%")
                                ->orWhere('marca', 'LIKE', "%$request->search%");
                        });
                    })

                    ->when($request->filled("posti"), function ($q) use ($request) {
                        $q->where('posti', $request->posti);
                    })

                    ->when($request->filled("dataRitiro"), function ($q) use ($request) {
                        $q->where(function ($query) use ($request) {
                            $query->whereDate('emissione', '<=', $request->dataRitiro)
                                ->whereDate('scadenza', '>=', $request->dataConsegna);
                            })
                            ->where(function ($query) use ($request) {
                                $query->whereHas('noleggio', function ($que) use ($request) {
                                    $que->where('attivo', true)->where(function ($q) use ($request) {
                                        $q->whereDate('dataConsegna', '<=', $request->dataRitiro)
                                            ->orWhereDate('dataRitiro', '>=', $request->dataConsegna);
                                    });
                                })
                                ->orWhereDoesntHave('noleggio');
                            });
                    })->paginate(10);
        }
        else {
            $result = [];
        }

        return view("public.catalogo", ["result" => $result]);
    }

}
