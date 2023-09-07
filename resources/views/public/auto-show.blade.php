@extends("public.layout.public-layout")
@section("title", "Auto - " . $auto->marca . " - " .$auto->modello)
@section("content")
    <div class="back-btn-cont">
        <a class="btn-rect btn-black" href="{{url()->previous()}}">
            <div class="flex-centered">
                <img src="{{asset("/img/icon/left-arrow.png")}}" width="20" height="20">BACK
            </div>
        </a>
    </div>
    <section class="product-section">
        <div>
            <div class="product-image">
                <img src="{{asset($auto->foto)}}">
            </div>
            <div class="product-details">
                <div class="product-title">
                    <div class="product-title-border"></div>
                    <h1>{{$auto->marca . " - " .$auto->modello}}</h1>
                </div>
                <div class="product-price">
                    {{$auto->costoGiornaliero}} €
                </div>
                <div class="product-time">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                    </svg>
                    <p>Scadenza: {{$auto->scadenza}}</p>
                </div>
            </div>
        </div>
       <div class="product-info">
           <h1>Allestimento</h1>
           <ul>
               <li>
                   <img src="{{asset("img/icon/gas-station.png")}}" width="35" height="35">
                   <p>{{$auto->motore}}</p>
               </li>
               <li>
                   <img src="{{asset("img/icon/porta-auto.png")}}" width="35" height="35">
                   <p>{{$auto->porte}}</p>
               </li>
               <li>
                   <img src="{{asset("img/icon/bagaglio.png")}}" width="35" height="35">
                   <p>{{$auto->bagaglio}}</p>
               </li>
               <li>
                   <img src="{{asset("img/icon/cambio.png")}}" width="35" height="35">
                   <p>{{$auto->cambio}}</p>
               </li>
               <li>
                   <img src="{{asset("img/icon/posti-auto.png")}}" width="35" height="35">
                   <p>{{$auto->posti}}</p>
               </li>
           </ul>
       </div>
        @if ($auto->descrizione != null)
            <div class="product-description">
                <h2>Descrizione:</h2>
                <p>
                    {{$auto->descrizione}}
                </p>
            </div>
        @endif
    </section>
@endsection
