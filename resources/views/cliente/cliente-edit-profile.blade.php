@extends("cliente.layout.cliente-layout")
@section("title", "Cliente - Profilo")
@section("content")
    <h1>Informazioni Personali</h1>
    {{ Form::open(['route' => 'cliente.update.profile', 'method' => 'PUT']) }}
    <div class="row-flex">
        <div class="cell-1of2">
            {{ Form::label("nome", "Nome:") }}
            {{ Form::text('nome',Auth::user()->utenteable->nome, ["class" => "input-dark-theme"]) }}
        </div>
        <div class="cell-1of2">
            {{ Form::label("cognome", "Cognome:") }}
            {{ Form::text('cognome', Auth::user()->utenteable->cognome, ["class" => "input-dark-theme"]) }}
        </div>
    </div>
    <div class="row-flex">
        <div class="cell-1of2">
            {{ Form::label("username", "Username:") }}
            {{ Form::text('username', Auth::user()->username, ["class" => "input-dark-theme"]) }}
        </div>
        <div class="cell-1of2">
            {{ Form::label("residenza", "Residenza:") }}
            {{ Form::text('residenza', Auth::user()->utenteable->residenza, ["class" => "input-dark-theme"]) }}
        </div>

    </div>
    <div class="row-flex">
        <div class="cell-1of2">
            {{ Form::label("occupazione", "Occupazione:")}}
            {{ Form::select('occupazione', ['Non specificato' => 'Non specificato', 'Dipendente' => 'Dipendente', 'Libero professionista' => 'Libero professionista', 'Studente' => 'Studente', 'Disoccupato' => 'Disoccupato'], Auth::user()->utenteable->occupazione, ["class" => "select-dark-theme",]) }}
        </div>
        <div class="cell-1of2">
            {{ Form::label("dataNascita", "Date di nascita:") }}
            {{ Form::date('dataNascita', Auth::user()->utenteable->dataNascita, ["class" => "input-dark-theme"]) }}
        </div>
    </div>
    <div class="row-flex">
        <div class="cell-1of2">
        </div>
        <div class="cell-1of2 " id="profile-btn-container">
            {{ Form::button('Reset', ['class' => 'btn btn-light', "type" => "reset"]) }}
            {{ Form::button('Submit', ['class' => 'btn btn-outline-dark', "type" => "submit"]) }}
        </div>
    </div>
    {{ Form::close() }}
@endsection
