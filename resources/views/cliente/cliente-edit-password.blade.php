@extends("cliente.layout.cliente-layout")
@section("title", "Cliente - Password")
@section("content")
    <h1>Modifica Password</h1>
    {{ Form::open(['route' => 'cliente.update.password', 'method' => 'PUT']) }}
    <div class="row-flex">
        <div class="cell-1of2">
            {{Form::label("oldPassword", "Vecchia password:")}}
            {{ Form::password('oldPassword', ["class" => "input-dark-theme"]) }}
        </div>
        <div class="cell-1of2"></div>
    </div>
    <div class="row-flex">
        <div class="cell-1of2">
            {{Form::label("password", "Nuova password:")}}
            {{ Form::password('password', ["class" => "input-dark-theme"]) }}
        </div>
        <div class="cell-1of2">
            {{Form::label("password_confirmation", "Conferma nuova password:")}}
            {{ Form::password('password_confirmation', ["class" => "input-dark-theme"]) }}
        </div>
    </div>
    <div class="row-flex">
        <div class="cell-1of2"></div>
        <div class="cell-1of2" id="password-btn-container">
            {{ Form::button('Reset', ['class' => 'btn btn-light', "type" => "reset"]) }}
            {{ Form::button('Submit', ['class' => 'btn btn-outline-dark', "type" => "submit"]) }}
        </div>
    </div>
    {{ Form::close() }}
@endsection
