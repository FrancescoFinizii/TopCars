@extends("public.layout.public-layout")
@section("title", "FAQ")
@section("content")
    <header>
        <h1>Domande Frequenti</h1>
        @include("public.navbar.FAQ-navbar")
    </header>
    <div class="faq">
        @foreach(["Prenotazione veicolo", "Requisiti noleggio", "Responsabilità e coperture", "Carta e pagamenti", "Ritiro del veicolo", "Durante il noleggio", "Riconsegna del veicolo", "Altro"] as $type)
            <section class="faq-section" id="{{$type}}">
                <h2>{{$type}}</h2>
                @foreach(\App\Models\FAQ::where("tipologia", $type)->get() as $elem)
                    <details>
                        <summary><b>{{$elem->domanda}}</b></summary>
                        <div><p>{{$elem->risposta}}</p></div>
                    </details>
                @endforeach
            </section>
        @endforeach
    </div>
@endsection
