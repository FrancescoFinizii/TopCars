<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UtenteController extends Controller
{

    /**
     * Provvede ad autenticare un utente
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();


            if (Gate::allows('isAdmin')):
                return redirect()->route('home');
            elseif (Gate::allows('isStaff')):
                return redirect()->route('auto.index');
            elseif (Gate::allows('isClient')):
                return redirect()->route('cliente.edit.profile');
            endif;

        }

        return back()->withErrors(["status" => 'Credenziali errate.']);
    }


    /**
     * Provvede a disconnettere un'utente dalla piattaforma
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route("home");
    }
}
