@extends("public.layout.public-layout")
@section("title", "Home")
@section("content")
    <section id="intro" style="background-image:url({{url('img/background.jpg')}}),linear-gradient(to bottom, transparent, black)">
        <div>
            <p id="slogan">rendi il tuo viaggio memorabile</p>
            <a href="{{route("relazione")}}" target="_blank" id="doc-link">Documentazione
                <span id="play-icon-container">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                        <path
                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                    </svg>
                </span>
            </a>
        </div>
    </section>
    <section class="default-section" id="chi-siamo">
        <div class="row-flex">
            <div class="cell-1of2">
                <h1>Chi siamo</h1>
                <p>Ci impegniamo e lavoriamo con passione tutti i giorni, da oltre 15 anni, per garantire ai nostri
                    clienti le <b>migliori soluzioni di mobilità</b>. Siamo presenti in tutta Italia con ben <b>45</b>
                    sedi situate
                    nelle principali <b>località turistiche</b>, negli <b>aeroporti</b> e nelle <b>stazioni
                        ferroviarie</b> del territorio.
                    Noleggiamo <b>auto</b> esclusivamente a <b>privati</b> in varie modalità: <b>breve, medio e lungo
                        termine</b>. <br>
                    Il nostro obiettivo è capire appieno le esigenze dei nostri clienti al fine di creare
                    soluzioni e servizi nuovi, all’avanguardia e innovativi che siano in grado di supportare
                    costantemente il nostro pubblico. Siamo un’azienda affidabile a <b>capitale 100% italiano</b>,
                    abbiamo
                    <b>tariffe competitive</b> e le nostre offerte di noleggio sono flessibili, adattabili e
                    perfettamente su
                    misura per i nostri clienti.</p>
            </div>
            <div class="cell-1of2">
                <img src="{{asset("img/venditore-auto.jpg")}}">
            </div>
        </div>
    </section>
    <section class="default-section dark-section">
        <h1>Noleggiare è <span id="text-animation"></span></h1>
        <p>
            <b>Noleggiare</b>: un nome semplice per un servizio di autonoleggio che ti semplifica le vacanze e il
            lavoro.
            Con noi puoi ritirare, direttamente in aeroporto e nelle principali città italiane, un’auto nuova,
            sicura e scrupolosamente controllata: un noleggio sempre <i>affidabile, efficiente, rapido, conveniente.</i>
            Siamo già presenti nelle principali località come Verona, Milano, Palermo, Napoli, Genova, Torino, Catania,
            Brindisi e Roma.<br> Noleggiare è la scelta migliore per le tue vacanze in Italia, con tante sedi in
            Sardegna,
            Puglia, Sicilia, Campania e Calabria, ma anche per i tuoi viaggi di lavoro. Una società a
            capitale 100% italiano per un servizio noleggio auto in Italia di qualità superiore. <br>Mettici alla prova!
        </p>
    </section>
    <section class="default-section">
        <h1>I nostri servizi</h1>
        <div class="row-flex">
            <div class="cell-1of2">
                <div class="service-item" style="background-image:url({{url('img/rental-car2.jpg')}})">
                    <div class="visible-div">
                        <h2>Noleggio breve termine</h2>
                    </div>
                    <div class="hidden-div">
                        <p> Adatto in quelle situazioni in cui si è costretti a dover riorganizzare e pianificare i
                            propri
                            spostamenti con una certa frequenza.</p>
                        <a class="btn-rect btn-outline-dark" href="{{route("catalogo")}}">Scopri di più</a>
                    </div>
                </div>
            </div>
            <div class="cell-1of2">
                <div class="service-item" style="background-image:url({{url('img/rental-car.jpg')}})">
                    <div class="visible-div">
                        <h2>Noleggio lungo termine</h2>
                    </div>
                    <div class="hidden-div">
                        <p>Adatto quando si vuole usufruire quotidianamente di un'autovettura senza doverla acquistare
                            e doversi far carico dei costi di manutenzione</p>
                        <a class="btn-rect btn-outline-dark" href="{{route("catalogo")}}">Scopri di più</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="default-section dark-section">
        <div class="row-flex">
            <div class="cell-1of2">
                <h1>Recapiti</h1>
                <address>
                    <a href="tel:3115552368" title="Numero Assistenza">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-telephone-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                        </svg>
                        311 555 2368
                    </a>
                    <a href="mailto:TopCars.staff@example.com" title="E-mail Staff">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-envelope-fill" viewBox="0 0 16 16">
                            <path
                                    d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                        </svg>
                        TopCars.staff@example.com
                    </a>

                    <a href="https://goo.gl/maps/BdGKS9Lk3qiFF5We9" title="Sede Legale">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                            <path
                                    d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                        </svg>
                        Via Brecce Bianche 12, Ancona
                    </a>
                </address>
            </div>
            <div class="cell-1of2">
                <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2889.948982877482!2d13.514020176111124!3d43.586778971105275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132d80233dd931ef%3A0x161719e4f3f5daaf!2sUniversit%C3%A0%20Politecnica%20delle%20Marche%20-%20Facolt%C3%A0%20di%20Ingegneria!5e0!3m2!1sit!2sit!4v1689648158000!5m2!1sit!2sit"
                        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    <section class="default-section">
        <h1>Termini e condizioni</h1>
        <p>
            Il noleggio dei veicoli da parte della società <b>TopCars S.r.l.</b> o dei propri affiliati o concessionari
            (di seguito, il “Locatore”) è regolato dalle presenti condizioni generali di noleggio (di seguito,
            le “Condizioni Generali di Noleggio”), comprensive dell’Informativa sulla Privacy, della lettera di
            noleggio (di seguito, la “Lettera di Noleggio” o il “Contratto”) sottoscritta dal cliente (di seguito,
            il “Cliente” o il “Locatario”) al momento del noleggio di un veicolo (di seguito, il “Veicolo”), del
            Tariffario vigente al momento della sottoscrizione della medesima Lettera di Noleggio (pubblicato online
            sul sito Web www.TopCars.it) e della Politica sui Danni. Il Cliente dichiara di aver visionato tutti i
            sopraccitati documenti (di seguito, complessivamente, la “Documentazione Contrattuale”) e di averne preso
            piena e completa conoscenza.
            Il Cliente, sottoscrivendo la Lettera di Noleggio, dichiara di aver preso conoscenza e di accettare le
            Condizioni Generali di Noleggio e di approvare specificamente i seguenti articoli: Art. 2 (Modalità e
            tempi di prenotazione e pagamento del noleggio), Art. 5 (Circolazione del Veicolo e condizioni di utilizzo),
            Art. 6 (Presa in consegna e restituzione del Veicolo), Art. 7 (Responsabilità del Cliente), Art. 8
            (Contratto in nome e/o per conto di terzo e responsabili in solido), Art. 10 (Addebiti), Art. 11 (Utilizzo
            di dispositivi satellitari), Art. 12 (Clausola risolutiva), Art. 14. (Modifiche contrattuali), Art. 15
            (Legge applicabile e Foro esclusivo), Art. 16 (Traduzione), Art. 17 (Interpretazione), Art. 18 (Domicilio
            e comunicazioni).
        </p>
    </section>
    <div class="row-flex">
        <div class="cell-1of2">
            <section class="default-section dark-section">
                <h1>Accesso ai servizi</h1>
                <p>
                    La piattaforma non impone restrizioni riguardo la consultazione delle offerte. Il noleggio è
                    consentito solamente agli utenti registrati. La registrazione è riservata alle persone in possesso di
                    patente B e di età compresa tra i 19 e i 75 anni. Nel caso in cui non si
                    dispone di un account è possibile crearne uno in modo totalmente gratuito al seguente
                    <a href="{{route("register")}}" class="std-link">indirizzo</a>. Per maggiori informazioni è possibile visione le
                    FAQ al seguente <a href="{{route('faq')}}" class="std-link">link</a>. Una volta autenticati gli
                    utenti
                    possono modificare le proprie informazioni personali e se neccessario contattare l'amministratore
                    del
                    sito in caso di problemi. I membri dello staff possono accedere al sistema utilizzando le
                    credenziali
                    di accesso fornite dall'amministratore.
                </p>
            </section>
        </div>
        <div class="cell-1of2">
            <section class="default-section">
                <h1>FAQ</h1>
                <p>
                    Hai bisogno di aiuto? Consulta la pagina dedicata alla lista delle domande più frequenti riguardo
                    alcuni temi e attività presenti sulla piattaforma TopCars.
                </p>
                <a href="{{route('faq')}}" class="btn-rect btn-blue">Visita la pagina!</a>
            </section>
        </div>
    </div>
@endsection
