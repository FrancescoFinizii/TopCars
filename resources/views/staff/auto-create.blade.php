@extends(Auth::user()->utenteable_type == "Admin" ? "admin.layout.admin-layout" :"staff.layout.staff-layout")
@section("title", "Auto - Aggiungi")
@section("content")
@push('javascript')
    <script src="{{asset("js/auto.js")}}"></script>
@endpush
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
            <a href="{{route("auto.index")}}" class="parent-left flex-centered">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
            </svg>
            </a>
            <h1>Aggiungi Auto</h1>
        </div>
        {{Form::open(["route" => "auto.store", "method" => "POST", "enctype" => "multipart/form-data"])}}
        <div class="form-input">
            <div class="input-item">
                {{ Form::label("targa", "Targa: ") }}
                {{ Form::text('targa', null, ['class' => 'input-white-theme']) }}
            </div>
            <div class="input-item">
                {{ Form::label("modello", "Modello: ") }}
                {{ Form::text('modello', null, ['class' => 'input-white-theme']) }}
            </div>
            <div class="input-item">
                {{ Form::label("marca", "Marca: ") }}
                {{ Form::text('marca', null, ['class' => 'input-white-theme']) }}
            </div>
            <div class="input-item">
                {{ Form::label("motore", "Motore: ") }}
                {{ Form::select('motore',[
                                "Benzina" => "Benzina",
                                "Diesel" => "Diesel",
                                "GPL" => "GPL",
                                "Metano" => "Metano",
                                "Ibrida" => "Ibrida",
                                "Elettrica" => "Elettrica",
                                "Idrogeno" => "Idrogeno"], null, ['id'=>'motore', "class" => "select-white-theme"])
                                }}
            </div>
            <div class="input-item">
                {{ Form::label("cambio", "Cambio: ")}}
                {{ Form::select('cambio',[
                               "Automatico" => "Automatico",
                               "Meccanico" => "Meccanico",
                               "Sequenziale" => "Sequenziale"], null, ["class" => "select-white-theme"])
                               }}
            </div>
            <div class="input-item">
                {{ Form::label("bagaglio", "Bagaglio: ") }}
                <div class="flex-centered">
                    {{ Form::number('bagaglio', null, ['class' => 'input-white-theme']) }}
                    <span class="suffix">cm³</span>
                </div>
            </div>
            <div class="input-item">
                {{ Form::label("porte", "Porte: ") }}
                {{ Form::select('porte',[
                               "2" => "2",
                               "3" => "3",
                               "4" => "4",
                               "5" => "5"], null, ["class" => "select-white-theme"])
                               }}
            </div>
            <div class="input-item">
                {{ Form::label("posti", "Posti: ")}}
                {{ Form::select('posti',[
                               "2" => "2",
                               "3" => "3",
                               "4" => "4",
                               "5" => "5",
                               "6" => "6",
                               "7" => "7",
                               "8" => "8",
                               "9" => "9"], null, ["class" => "select-white-theme"])
                               }}
            </div>
            <div class="input-item">
                {{ Form::label("autonomia", "Autonomia: ")}}
                <div class="flex-centered">
                    {{ Form::number('autonomia', null, ['class' => 'input-white-theme', 'step' => '0.01']) }}
                    <span class="suffix" id="autonomia-suffix">Km/litro</span>
                </div>
            </div>
            <div class="input-item">
                {{ Form::label("colore", "Colore: ")}}
                {{ Form::text('colore', null, ['class' => 'input-white-theme']) }}
            </div>
            <div class="input-item">
                {{ Form::label("foto", "Foto: ") }}
                {{ Form::file("foto", ["accept" => ".jpg, .jpeg, .png", 'class' => 'input-white-theme' ]) }}
            </div>
            <div class="input-item">
                {{ Form::label("emissione", "Disponibile dal: ") }}
                {{ Form::date("emissione", null, ['class' => 'input-white-theme' ]) }}
            </div>
            <div class="input-item">
                {{ Form::label("scadenza", "Disponibile fino al: ")}}
                {{ Form::date('scadenza', null, ['class' => 'input-white-theme']) }}
            </div>
            <div class="input-item">
                {{ Form::label("costoGiornaliero", "Costo Giornaliero: ")}}
                <div class="flex-centered">
                    {{ Form::number('costoGiornaliero', null, ['class' => 'input-white-theme']) }}
                    <span class="suffix">€</span>
                </div>
            </div>
            <div class="input-item two-columns">
                {{ Form::label("descrizione", "Descrizione: (opzionale)") }}
                {{ Form::textarea('descrizione', null, ['class' => 'input-white-theme']) }}
            </div>
        </div>
        <div class="form-button">
            {{ Form::button('Reset', ['class' => 'btn btn-light', "type" => "reset"]) }}
            {{ Form::button('Submit', ['class' => 'btn btn-blue', "type" => "submit"]) }}
        </div>
        {{ Form::close() }}
    </div>
</section>
@endsection



