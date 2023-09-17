<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FAQController extends Controller
{

    /**
     * Mostra l'elenco delle FAQ presenti nel database
     */
    public function index()
    {

        return view("admin.faq-index", ["faqs" => FAQ::orderBy("id")->orderBy("tipologia")->paginate(10)]);
    }


    /**
     * Mostra il form per creare un nuova FAQ
     */
    public function create()
    {
        return view("admin.faq-create");
    }


    /**
     * Salva una nuova FAQ nel database
     */
    public function store(Request $request)
    {
        $request->validate([
            'domanda' => 'required|unique:faq,domanda',
            'risposta' => 'required',
            'tipologia' => ['required', Rule::in(["Prenotazione veicolo", "Requisiti noleggio", "Responsabilità e coperture", "Carta e pagamenti", "Ritiro del veicolo", "Durante il noleggio", "Riconsegna del veicolo", "Altro"])],
        ]);
        FAQ::create($request->all());
        return redirect()->route("faq.index");
    }


    /**
     * Mostra la pagina pubblica con tutte le FAQ
     */
    public function show()
    {
        return view("public.faq");
    }


    /**
     * Mostra il form per modificare la FAQ
     */
    public function edit(FAQ $faq)
    {
        return view("admin.faq-edit", ["faq" => $faq]);
    }


    /**
     * Aggiorna la FAQ sul database con i dati inviati
     */
    public function update(Request $request, FAQ $faq)
    {
        $request->validate([
            'domanda' => ['required', Rule::unique('faq', 'domanda')->ignore($faq)],
            'risposta' => 'required',
            'tipologia' => ['required', Rule::in(["Prenotazione veicolo", "Requisiti noleggio", "Responsabilità e coperture", "Carta e pagamenti", "Ritiro del veicolo", "Durante il noleggio", "Riconsegna del veicolo", "Altro"])],
        ]);

        $faq->update($request->all());

        return redirect()->route("faq.index");
    }


    /**
     * Elimina la FAQ dal database
     */
    public function destroy(FAQ $faq)
    {
        $faq->delete();
        return redirect()->route("faq.index");
    }
}
