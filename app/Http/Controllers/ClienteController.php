<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Utente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ClienteController extends Controller
{

    /**
     * Mostra l'elenco dei clienti presenti nel database
     */
    public function index(Request $request)
    {
        $clienti = Cliente::paginate(10);

        if($request->ajax()){
            return view('admin.client-table', compact('clienti'))->render();
        }
        else {
            return view('admin.cliente-index',compact('clienti'));
        }
    }


    /**
     * Mostra il form per creare un nuovo cliente
     */
    public function create()
    {
        return view("public.login");
    }


    /**
     * Salva un nuovo cliente nel database
     */
    public function store(Request $request) {

        $request->validate([
            'nome' => 'required|alpha:ascii|max:30',
            'cognome' => 'required|alpha:ascii|max:30',
            'residenza' => 'required|string|max:50',
            'occupazione' => ['required', Rule::in(['Non specificato', 'Dipendente', 'Libero professionista', 'Studente', 'Disoccupato'])],
            'dataNascita' => 'required|date|before: -19 years|after: -75 years|size:10',
            'username' => 'required|alpha_dash|min:8|max:30|unique:utente,username',
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()],
            'password_confirmation' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $foto = "storage/avatar.png";

        $cliente = Cliente::create(array_merge($request->only("nome", "cognome", "residenza", "occupazione", "dataNascita"), ["foto" => $foto]));


        $utente = $cliente->utente()->create($request->only("username", "password"));

        if ($request->hasFile("foto")) {
            $foto = StorageController::storeImage($request->file("foto"), $cliente->id, "cliente");
            $cliente->update(["foto" => $foto]);
        }

        Auth::login($utente);

        return redirect()->route("cliente.edit.profile");
    }


    /**
     * Fornisce la pagina in cui è possibile modificare le informazioni personali del cliente
     */
    public function editProfile()
    {
        return view("cliente.cliente-edit-profile");
    }


    /**
     * Fornisce la pagina in cui è possibile modificare la password del cliente
     */
    public function editPassword()
    {
        return view("cliente.cliente-edit-password");
    }


    /**
     * Aggiorna le informazioni personali del cliente sul database con i dati inviati
     */
    public function updateProfile(Request $request)
    {
        $request->validate([
            'nome' => 'required|alpha:ascii|max:30',
            'cognome' => 'required|alpha:ascii|max:30',
            'username' => ['required', 'alpha_dash', 'min:8', 'max:30', Rule::unique("utente", "username")->ignore(Auth::user())],
            'residenza' => 'required|string|max:50',
            'occupazione' => ['required', Rule::in(['Non specificato', 'Dipendente', 'Libero professionista', 'Studente', 'Disoccupato'])],
            'dataNascita' => 'required|date|before: -19 years|after: -75 years|size:10',
        ]);
        Auth::user()->update($request->only("username"));
        Auth::user()->utenteable->update($request->except("username"));
        return redirect()->back()->with('success','Dati aggiornati correttamente');
    }


    /**
     * Aggiorna la password del cliente sul database
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'oldPassword' => 'required|current_password',
            'password' => ['required', 'confirmed', 'different:oldPassword', Password::min(8)->mixedCase()->numbers()],
            'password_confirmation' => 'required'
        ]);
        Auth::user()->update(["password" => $request->password]);
        return redirect()->back()->with('success','Password aggiornata correttamente!');
    }


    /**
     * Aggiorna la foto profilo del cliente
     */
    public function updateImage(Request $request) {

        $request->validate([
            'foto' => 'image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $foto = StorageController::updateImage($request->file("foto"), Auth::user()->utenteable->id, "cliente");
        Auth::user()->utenteable->update(["foto" => $foto]);
        return redirect()->back()->with('success','Immagine del profilo aggiornata correttamente!');
    }


    /**
     * Elimina i clienti selezionati dal database
     */
    public function deleteSelected(Request $request)
    {
        $ids = $request->ids;
        Utente::where("utenteable_type", "App\Models\Cliente")->whereIn("utenteable_id", $ids)->delete();
        Cliente::whereIn("id", $ids)->delete();
        foreach ($ids as $id) {
            StorageController::findAndDeleteImage($id, "cliente");
        }
        return response()->json(['url'=>route("cliente.index")]);
    }


    /**
     * Elimina tutti i clienti dal database
     */
    public function deleteAll()
    {
        Utente::where("utenteable_type", "App\Models\Cliente")->delete();
        DB::table('cliente')->delete();
        StorageController::deleteDirectory(public_path("storage/cliente"));
        return redirect()->route("cliente.index");
    }
}
