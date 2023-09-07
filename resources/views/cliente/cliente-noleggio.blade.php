@extends("cliente.layout.cliente-layout")
@section("title", "Cliente - Noleggio")
@section("content")
    <h1>Noleggio</h1>
    <section class="">
        @if($noleggio != null)
            <div class="noleggio-item">
                <img src="{{asset($noleggio->auto->foto)}}">
                <div class="noleggio-details">
                    <p><b>Data e Ora ritiro</b>: {{ \Carbon\Carbon::parse($noleggio->dataRitiro)->format("d-m-Y")  . " " .$noleggio->oraRitiro}}</p>
                    <p><b>Località ritiro</b>: {{ $noleggio->localitàRitiro }} </p>
                    <p><b>Data e ora consegna</b>: {{ \Carbon\Carbon::parse($noleggio->dataConsegna)->format("d-m-Y") . " " .$noleggio->oraConsegna}}</p>
                    <p><b>Località consegna</b>: {{ $noleggio->localitàConsegna }}</p>
                    <p><b>Importo</b>: {{ $noleggio->importo }} €</p>
                </div>
            </div>
        @else
            <div class="noleggio-empty">
                <h2>Nessun noleggio presente</h2>
            </div>
        @endif
    </section>
@endsection
