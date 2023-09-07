@extends("public.layout.public-layout")
@section("title", "Sign up")
@section("content")
    <div class="background" style="background-image:url({{url('img/background3.jpg')}});">
        <div class="card">
            <div class="icon-container flex-centered">
                <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" fill="currentColor"
                     viewBox="0 0 16 16"
                     class="bi bi-person">
                    <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                </svg>
            </div>

            {{ Form::open(['route' => 'register', "method" => "POST", "enctype" => "multipart/form-data"]) }}

            {{ Form::label("nome", "Nome:") }}
            {{ Form::text('nome', null, ['id' => 'nome', 'class' => 'input-dark-theme']) }}
            @if ($errors->has('nome'))
                @foreach ($errors->get('nome') as $message)
                    <p class="errorLabel">{{ $message }}</p>
                @endforeach
            @endif

            {{ Form::label("cognome", "Cognome:") }}
            {{ Form::text('cognome', null, ['id' => 'cognome', 'class' => 'input-dark-theme']) }}
            @if ($errors->has('cognome'))
                @foreach ($errors->get('cognome') as $message)
                    <p class="errorLabel">{{ $message }}</p>
                @endforeach
            @endif

            {{ Form::label("residenza", "Residenza:") }}
            {{ Form::text('residenza', null, ['id' => 'residenza', 'class' => 'input-dark-theme']) }}
            @if ($errors->has('residenza'))
                @foreach ($errors->get('residenza') as $message)
                    <p class="errorLabel">{{ $message }}</p>
                @endforeach
            @endif

            <div>
                {{ Form::label("occupazione", "Occupazione:") }}
                {{ Form::select('occupazione', ['Non specificato' => 'Non specificato',
                                                'Dipendente' => 'Dipendente',
                                                'Libero professionista' => 'Libero professionista',
                                                'Studente' => 'Studente',
                                                'Disoccupato' => 'Disoccupato'], null, ['id' => 'occupazione', 'class' => 'select-dark-theme']) }}
                @if ($errors->has('occupazione'))
                    @foreach ($errors->get('occupazione') as $message)
                        <p class="errorLabel">{{ $message }}</p>
                    @endforeach
                @endif
            </div>

            {{ Form::label("dataNascita", "Data di nascita:") }}
            {{ Form::date('dataNascita', null, ['id' => 'dataNascita', 'class' => 'input-dark-theme']) }}
            @if ($errors->has('dataNascita'))
                @foreach ($errors->get('dataNascita') as $message)
                    <p class="errorLabel">{{ $message }}</p>
                @endforeach
            @endif

            {{ Form::label("username", "Username:") }}
            {{ Form::text('username', null, ['id' => 'username', 'class' => 'input-dark-theme']) }}
            @if ($errors->has('username'))
                @foreach ($errors->get('username') as $message)
                    <p class="errorLabel">{{ $message }}</p>
                @endforeach
            @endif

            {{ Form::label("password", "Password:") }}
            {{ Form::password('password', ['id'=>'password', 'class' => 'input-dark-theme']) }}
            @if ($errors->has('password'))
                @foreach ($errors->get('password') as $message)
                    <p class="errorLabel">{{ $message }}</p>
                @endforeach
            @endif

            {{ Form::label("password_confirmation", "Conferma password:") }}
            {{ Form::password('password_confirmation', ['id' => 'password_confirmation', 'class' => 'input-dark-theme']) }}
            @error("password_confirmation")
                <p class="errorLabel">{{ $message }}</p>
            @enderror

            {{ Form::label("foto", "Foto: ") }}
            {{ Form::file("foto", ["id" => "foto" , "accept" => ".jpg, .jpeg, .png", 'class' => 'input-dark-theme' ]) }}
            @if ($errors->has('foto'))
                @foreach ($errors->get('foto') as $message)
                    <p class="errorLabel">{{ $message }}</p>
                @endforeach
            @endif

            {{ Form::button('Registrati', ['class' => 'btn btn-black btn-large', "type" =>"submit"]) }}
            {{ Form::close() }}
            <p class="helpLabel">Hai già un account? <a class="std-link" href="{{route('login')}}">Accedi!</a></p>
        </div>
    </div>
@endsection
