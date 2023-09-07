@extends("admin.layout.admin-layout")
@section("title", "Staff - Modifica")
@push('javascript')
    <script src="{{asset("js/image-edit.js")}}"></script>
@endpush
@section("content")
    <section class="management-section" style="background-image: url({{url('img/texture.jpg')}})">
        @if ($errors->any())
            <div class="alert alert-danger">
                <p>ATTENZIONE! Si sono verificati i seguenti errori:</p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            <p>{{ $error }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-container">
            <div class="form-heading">
                <a href="{{route("staff.index")}}" class="parent-left flex-centered">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                         class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                        <path
                            d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                    </svg>
                </a>
                <h1>Modifica Staff</h1>
            </div>
            {{Form::open(["route" => ["staff.update", $staff], "method" => "PUT", "enctype" => "multipart/form-data"])}}
            <div class="form-input">
                <div class="input-item" id="image-item-input">
                    @include("helpers.image-item", ["size" => "100px", "path" => $staff->foto, "id" => "foto"])
                </div>
                <div class="input-item item-centered">
                    {{Form::label("username", "Username: ")}}
                    {{ Form::text('username', $staff->utente->username, ['class' => 'input-white-theme']) }}
                </div>
                <div class="input-item">
                    {{Form::label("nome", "Nome: ")}}
                    {{ Form::text('nome', $staff->nome, ['class' => 'input-white-theme']) }}
                </div>
                <div class="input-item">
                    {{Form::label("cognome", "Cognome: ")}}
                    {{ Form::text('cognome', $staff->cognome, ['class' => 'input-white-theme']) }}
                </div>
                <div class="input-item">
                    {{Form::label("password", "Password: (Opzionale)")}}
                    {{ Form::password('password', ['class' => 'input-white-theme']) }}
                </div>
                <div class="input-item">
                    {{ Form::label("password_confirmation", "Conferma password: (Opzionale)") }}
                    {{ Form::password('password_confirmation', ['class' => 'input-white-theme']) }}
                </div>
            </div>
            <div class="form-button">
                {{ Form::button('Reset', ['class' => 'btn btn-light', "type" => "reset"]) }}
                {{ Form::button('Submit', ['class' => 'btn btn-blue', "type" => "submit"]) }}
            </div>
            {{Form::close()}}
        </div>
    </section>
@endsection
