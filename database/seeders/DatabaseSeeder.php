<?php

namespace Database\Seeders;

use App\Models\Auto;
use App\Models\Cliente;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // Default Cliente

        DB::table('cliente')->insert([
            'id' => 1,
            'nome' => 'cliente',
            'cognome' => 'cliente',
            'residenza' => 'ancona',
            'occupazione' => 'Studente',
            'dataNascita' => date('Y-m-d', mktime(0, 0, 0, 1, 1, 1995)),
            'foto' => 'storage/avatar.png',
        ]);


        // Default Staff

        DB::table('staff')->insert([
            'id' => 1,
            'nome' => 'staff',
            'cognome' => 'staff',
            'foto' => 'storage/avatar.png',
        ]);

        //Default Users

        DB::table('utente')->insert([
            [
                'id' => 1,
                'username' => 'clieclie',
                'password' => bcrypt('Qwerty123@'),
                'utenteable_id' => 1,
                'utenteable_type' => 'App\Models\Cliente',
                'remember_token' => Str::random(10)
            ],

            [
                'id' => 2,
                'username' => 'staffstaff',
                'password' => bcrypt('Qwerty123@'),
                'utenteable_id' => 1,
                'utenteable_type' => 'App\Models\Staff',
                'remember_token' => Str::random(10)
            ],

            // Admin

            [
                'id' => 3,
                'username' => 'adminadmin',
                'password' => bcrypt('Qwerty123@'),
                'utenteable_id' => null,
                'utenteable_type' => "Admin",
                'remember_token' => Str::random(10)
            ]
        ]);


        // Client
        Cliente::factory()->hasUtente(1)->count(20)->create();

        // Staff
        Staff::factory()->hasUtente(1)->count(20)->create();


        //FAQ Seeder
        DB::table("faq")->insert([
            [
                "tipologia" => "Prenotazione veicolo",
                "domanda" => "Come posso prenotare un veicolo?",
                "risposta" => "TopCars ti consente di verificare H24 7/7 la disponibilità dei veicoli e prenotare il tuo viaggio. Nella sezione 'Catalogo' del sito è possibile ricercare le vetture disponibili e selezionare quella di interesse. Solamente gli utenti registrati non in possesso di alcuna prenotazione possono effettuare il noleggio."
            ],
            [
                "tipologia" => "Prenotazione veicolo",
                "domanda" => "Come posso disdire la mia prenotazione?",
                "risposta" => "La disdetta non è possibile tramite piattaforma web. Per disdire una prenotazione occorre contattare il nostro Servizio Clienti. La cancellazione comporta una sanzione variabile da pagare la quale le verrà comunicata telefonicamente dai nostri operatori"
            ],
            [
                "tipologia" => "Requisiti noleggio",
                "domanda" => "Quali sono i limiti di età previsti per noleggiare un veicolo?",
                "risposta" => "Tutti i conducenti autorizzati dovranno avere un’età minima di 19 anni e non superiore ai 75 anni."
            ],
            [
                "tipologia" => "Responsabilità e coperture",
                "domanda" => "Quali coperture coprono le vetture a noleggio?",
                "risposta" => "Tutti i nostri veicoli sono coperti da copertura R.C. a norma delle vigenti leggi, la quale garantisce la copertura della Responsabilità Civile nei confronti di terzi. Anche i trasportati sono coperti dalla copertura R.C."
            ],
            [
                "tipologia" => "Carta e pagamenti",
                "domanda" => "Come posso pagare il noleggio?",
                "risposta" => "Il noleggio deve essere pagato al momento del ritiro prima del ritiro del veicolo."
            ],
            [
                "tipologia" => "Ritiro del veicolo",
                "domanda" => "Dove devo ritirare il mio veicolo?",
                "risposta" => "TopCars permette di scegliere il punto di ritiro dell'autovettura direttamente durante la fase di prenotazione. Una volta effettuato il noleggio basta recarsi all'orario indicato nel punto di ritiro dove il personale adetto la attende per consegnarle il veicolo."
            ],
            [
                "tipologia" => "Durante il noleggio",
                "domanda" => "Cosa devo fare in caso di guasto/breakdown?",
                "risposta" => "In caso di guasto, o a seguito di incidente che renda il veicolo non marciante, dovrai chiamare la nostra Assistenza Stradale, attiva H24 7/7, e seguire le istruzioni del nostro operatore."
            ],
            [
                "tipologia" => "Riconsegna del veicolo",
                "domanda" => "Come faccio ad avere la fattura del mio noleggio?",
                "risposta" => "La copia di cortesia della tua fattura ti sarà rilasciata direttamente dai nostri operatori al momento della riconsegna del veicolo. In caso di mancata consegna della fattura, contatta pure il nostro Servizio Clienti."
            ],
            [
                "tipologia" => "Altro",
                "domanda" => "Ho dimenticato un oggetto nel veicolo, cosa devo fare?",
                "risposta" => "In questo caso dovrai contattare direttamente l'amministratore. Non preocupparti TopCars ti mette a disposizione un apposito canale di comunicazione presente nella tua area personale. La tua richiesta sarà analizzata e ti verrà dato un riscontro nel tempo più breve possibile."
            ]
        ]);


        DB::table('auto')->insert([
            [
                'id' => 1,
                'targa' => "AA111AA",
                'modello' => "Aventador",
                'marca' => "Lamborghini",
                'motore' => "Benzina",
                'cambio' => "Automatico",
                'bagaglio' => 0,
                'porte' => "2",
                'posti' => "2",
                'autonomia' => 4.05,
                'colore' => "blu",
                'foto' => "storage/auto/1.png",
                'descrizione' => "La supercar Lamborghini Aventador è la diretta evoluzione della Murcielago: il nome del modello, come consuetudine della casa di Sant’Agata, deriva dal nome di un toro da combattimento. Il design esterno è caratterizzato dalle portiere con apertura verticale e nell’allestimento esterno spicca l’elevato utilizzo della fibra di carbonio, che rende la carrozzeria molto più leggera esaltando le prestazioni. La chicca della Lamborghini Aventador sono gli interni: ogni esemplare è personalizzato secondo le esigenze del cliente e presenta materiali di prima qualità, dettagli eleganti, design sportivo ispirato al mondo delle corse, cruscotto essenziale. Ingredienti che fanno diventare l’Aventador un’auto da sogno.",
                'emissione' => date('Y-m-d', mktime(0, 0, 0, 8, 9, 2023)),
                'scadenza' => date('Y-m-d', mktime(0, 0, 0, 8, 9, 2024)),
                'costoGiornaliero' => 1200.00,
            ],
            [
                'id' => 2,
                'targa' => "BB111BB",
                'modello' => "Mustang GT350",
                'marca' => "Ford",
                'motore' => "Benzina",
                'cambio' => "Manuale",
                'bagaglio' => 408,
                'porte' => "2",
                'posti' => "2",
                'autonomia' => 5.1,
                'colore' => "rosso",
                'foto' => "storage/auto/2.png",
                'descrizione' => "Mustang GT 350R è il mix perfetto tra sportività e potenza, unita a una classe senza tempo con i suoi straripanti 526 cavalli e 325 km/h di velocità massima. Shelby Mustang GT 350R è un fiore all’occhiello per chi ama sensazioni da pista e atmosfera da gara.",
                'emissione' => date('Y-m-d', mktime(0, 0, 0, 8, 9, 2023)),
                'scadenza' => date('Y-m-d', mktime(0, 0, 0, 8, 9, 2024)),
                'costoGiornaliero' => 500.00,
            ],
            [
                'id' => 3,
                'targa' => "CC111CC",
                'modello' => "Macan S",
                'marca' => "Porsche",
                'motore' => "Benzina",
                'cambio' => "Automatico",
                'bagaglio' => 1500,
                'porte' => "5",
                'posti' => "5",
                'autonomia' => 9,
                'colore' => "bianco",
                'foto' => "storage/auto/3.png",
                'descrizione' => "La PORSCHE MACAN è una grintosa suv derivata dalla precedente Audi Q5. Ha forme muscolose, con grandi ruote (fino a 21 pollici, con quelle posteriori più larghe rispetto a quelle anteriori), un cofano motore alto e lungo e vetri relativamente piccoli; è stata aggiornata nei dettagli alla fine del 2018 e poi a metà del 2021. Gli interni non sono molto ariosi, ma quattro persone di statura media stanno abbastanza comode; buona la capienza del baule (con apertura automatica e divano in tre parti reclinabili di serie). Lo stile è quello tipico della casa tedesca, con cruscotto a elementi circolari (il contagiri al centro, e un display di 4,8\" sulla destra) e alto tunnel centrale, dove la leva del cambio robotizzato a doppia frizione è circondata da un'elegante superficie tattile (da cui si azionano numerosi comandi). Per ottenere i rivestimenti più pregiati (come la vera pelle o gli inserti in fibra di carbonio) occorre mettere mano al portafogli, ma già di serie la cura nelle finiture è adeguata al prezzo (elevato) del auto. Apprezzabile l'impianto multimediale con display di 10,9\", ma Android Auto non è disponibile. La Porsche Macan è alta da terra e non pesa poco, ma, oltre a offrire un buon comfort, è una delle suv più \"gustose\" e precise da guidare, con una buona maneggevolezza e una trazione integrale che privilegia nettamente l'asse posteriore. I motori, tutti turbo a benzina, offrono una spinta adeguata (il 2.0), esuberante (il 2.9 biturbo con 381 CV) o brutale (il 2.9 della GTS); gli ultimi due, a sei cilindri invece che a quattro, sono più ricchi anche di coppia motrice, e si adattano meglio ai rapporti lunghi del cambio (che ha una risposta particolarmente rapida e fluida); inoltre, il peso maggiore garantisce una migliore precisione di guida ad alta velocità. La dotazione di serie non è molto ricca, e parecchi aiuti elettronici alla guida (come il cruise control adattativo) sono optional.",
                'emissione' => date('Y-m-d', mktime(0, 0, 0, 8, 9, 2023)),
                'scadenza' => date('Y-m-d', mktime(0, 0, 0, 8, 9, 2024)),
                'costoGiornaliero' => 200.00,
            ],
            [
                'id' => 4,
                'targa' => "DD111DD",
                'modello' => "M4 Coupè",
                'marca' => "Bmw",
                'motore' => "Benzina",
                'cambio' => "Automatico",
                'bagaglio' => 385,
                'porte' => "2",
                'posti' => "4",
                'autonomia' => 9,
                'colore' => "bianco",
                'foto' => "storage/auto/4.png",
                'descrizione' => "Super aggressiva davanti, una Serie 8 in miniatura dietro. L’ultima BMW M4 ha carattere e tanta potenza più di prima, specie in questa variante Competition. Rispetto alla sorella M3, la M4 non ha soltanto due porte in meno, ma ha guadagnato un design tutto nuovo: al posteriore, in particolare, il tetto particolarmente spiovente (a discapito dei pochi che siederanno lì dietro) e le forme sinuose le regalano tanta eleganza e personalità. I dettagli in carbonio, i sedili a guscio e i freni carboceramici sono solo alcuni degli optional per personalizzare la BMW M4 Competition e sfruttarne tutti i cavalli disponibili. Mentre gli accessori targati M Performance Parts vi assicurano di non passare inosservati anche a velocità più cittadine.",
                'emissione' => date('Y-m-d', mktime(0, 0, 0, 8, 9, 2023)),
                'scadenza' => date('Y-m-d', mktime(0, 0, 0, 8, 9, 2024)),
                'costoGiornaliero' => 750.00,
            ],
            [
                'id' => 5,
                'targa' => "EE111EE",
                'modello' => "Staria Wagon",
                'marca' => "Hyundai",
                'motore' => "Diesel",
                'cambio' => "Meccanico",
                'bagaglio' => 831,
                'porte' => "5",
                'posti' => "9",
                'autonomia' => 12.85,
                'colore' => "grigio",
                'foto' => "storage/auto/5.png",
                'descrizione' => "Hyundai ha annunciato il debutto di Nuova STARIA, VAN innovativo nel design e nella gestione degli spazi interni. Il multispazio presenta infatti dettagli stilistici inediti ed è stato sviluppato secondo un approccio “inside-out”, che parte dagli interni per massimizzare funzionalità e abitabilità. La presenza di posti a sedere flessibili, con grande capacità di scorrimento, combinata agli altissimi livelli di sicurezza in dotazione, rendono STARIA un veicolo adatto sia alle esigenze lavorative sia alla famiglia.",
                'emissione' => date('Y-m-d', mktime(0, 0, 0, 8, 9, 2023)),
                'scadenza' => date('Y-m-d', mktime(0, 0, 0, 8, 9, 2024)),
                'costoGiornaliero' => 316.80,
            ],
            [
                'id' => 6,
                'targa' => "FF111FF",
                'modello' => "Panda",
                'marca' => "Fiat",
                'motore' => "Metano",
                'cambio' => "Meccanico",
                'bagaglio' => 225,
                'porte' => "5",
                'posti' => "4",
                'autonomia' => 32.6,
                'colore' => "binco",
                'foto' => "storage/auto/6.png",
                'descrizione' => "La citycar per eccellenza (e da molti anni l'auto più acquistata dagli italiani) è invecchiata bene. Ha una linea da piccola multispazio, con volumi squadrati e profili tondeggianti che le danno un aspetto “muscoloso”, simpatico e ancor oggi moderno; utili i profili laterali in plastica (solo per alcuni allestimenti) che proteggono la vernice dai piccoli urti. I motivi quadrangolari stondati contraddistinguono gli elementi dell’abitacolo della FIAT PANDA, donando un aspetto personale e ben integrato. Una delle caratteristiche più apprezzate del modello a metano di Fiat Panda è la presenza del sistema di alimentazione a gas, che consente di risparmiare notevolmente sotto l'aspetto del consumo, con le prestazioni di sempre garantite dall'utilitaria della casa automobilistica torinese.",
                'emissione' => date('Y-m-d', mktime(0, 0, 0, 8, 9, 2023)),
                'scadenza' => date('Y-m-d', mktime(0, 0, 0, 8, 9, 2024)),
                'costoGiornaliero' => 35.00,
            ],
            [
                'id' => 7,
                'targa' => "GG111GG",
                'modello' => "500",
                'marca' => "Fiat",
                'motore' => "Diesel",
                'cambio' => "Meccanico",
                'bagaglio' => 185,
                'porte' => "3",
                'posti' => "4",
                'autonomia' => 21.7,
                'colore' => "rosso",
                'foto' => "storage/auto/7.png",
                'descrizione' => "A tanti anni dalla nascita (il debutto risale al 2007), la FIAT 500 mantiene un aspetto unico e intramontabile, che l'aggiornamento di luglio 2015 (nuovi paraurti e fanali) ha reso ancora più ricercato. L'interno rétro e con rivestimenti sfiziosi è omologato per quattro persone, anche se dietro c'è poco spazio e lo schienale molto \"in piedi\" non consente di stare comodi; la posizione di guida è rialzata e con solo le regolazioni \"di base\", mentre è accettabile, per una citycar, la capienza del baule. Sempre nel 2015 è stato introdotto un intuitivo impianto multimediale con schermo di 5\" o 7\" al centro della plancia: può essere integrato con radio digitale, navigatore e \"app\" dedicate.",
                'emissione' => date('Y-m-d', mktime(0, 0, 0, 8, 9, 2023)),
                'scadenza' => date('Y-m-d', mktime(0, 0, 0, 8, 9, 2024)),
                'costoGiornaliero' => 42.00,
            ],
            [
                'id' => 8,
                'targa' => "HH111HH",
                'modello' => "Model 3",
                'marca' => "Tesla",
                'motore' => "Elettrico",
                'cambio' => "Automatico",
                'bagaglio' => 561,
                'porte' => "5",
                'posti' => "5",
                'autonomia' => 580,
                'colore' => "bianco",
                'foto' => "storage/auto/8.png",
                'descrizione' => "Model 3 è elettrica al 100%, con un'autonomia stimata di 602 km: non dovrai più recarti presso un distributore di benzina. Puoi effettuare la ricarica a casa in qualsiasi momento o mentre sei in viaggio, con la possibilità di accedere a oltre 45.000 Supercharger in tutto il mondo. La Model 3 è caratterizzata da interni unici, con tecnologie avanzate, materiali premium e ampio spazio per le gambe. L'ampio tetto in vetro di Model 3 regala ai passeggeri un'esperienza di viaggio più luminosa, una sensazione di ariosità e una vista del cielo senza precedenti.",
                'emissione' => date('Y-m-d', mktime(0, 0, 0, 8, 9, 2023)),
                'scadenza' => date('Y-m-d', mktime(0, 0, 0, 8, 9, 2024)),
                'costoGiornaliero' => 125.00,
            ],
            [
                'id' => 9,
                'targa' => "SS111SS",
                'modello' => "C1",
                'marca' => "Citroen",
                'motore' => "Benzina",
                'cambio' => "Meccanico",
                'bagaglio' => 196,
                'porte' => "5",
                'posti' => "4",
                'autonomia' => 10.65,
                'colore' => "grigio",
                'foto' => "storage/auto/9.png",
                'descrizione' => "Citycar compatta, Citroën C1 si distingue da Toyota Aygo e Peugeot 108 (erede di 107, con cui condivide la base tecnica, gran parte dei componenti e lo stabilimento di produzione) soprattutto nei fari anteriori ovali. Riuscito è anche il design della fiancata, soprattutto nelle versioni più ricche con cerchi da 15”, e del portellone, tutto in vetro e affiancato da fanali arrotondati. L’abitacolo è abbastanza accogliente per quattro adulti ed equipaggiabile con la tecnologia più avanzata, come il Touch Pad che gestisce le app dello smartphone. Non mancano vani portaoggetti per rendere più pratico l’utilizzo della vettura. Il motore, un tre cilindri prodotto dalla Toyota, è grintoso e consuma molto poco.",
                'emissione' => date('Y-m-d', mktime(0, 0, 0, 8, 9, 2023)),
                'scadenza' => date('Y-m-d', mktime(0, 0, 0, 8, 9, 2024)),
                'costoGiornaliero' => 44.00,
            ],
            [
                'id' => 10,
                'targa' => "MM111MM",
                'modello' => "308",
                'marca' => "Peugeot",
                'motore' => "Benzina",
                'cambio' => "Meccanico",
                'bagaglio' => 412,
                'porte' => "5",
                'posti' => "5",
                'autonomia' => 12.5,
                'colore' => "nero",
                'foto' => "storage/auto/10.png",
                'descrizione' => "Berlina media equilibrata e personale, la PEUGEOT 308 sfoggia una grande mascherina verticale, fiancate morbidamente disegnate con parafanghi sporgenti e una parte posteriore \"muscolosa\", con le luci sottili collegate da una fascia nera lucida. Proposta nelle versioni a benzina, diesel (entrambe col cambio manuale o automatico) o elettrica, ha interni rifiniti con cura e moderni; molto ricco il sistema multimediale, con schermo \"touch\" orientato verso il guidatore e tasti virtuali \"scorciatoia\" personalizzabili, ai quali abbinare le funzioni che interessano di più. Il cruscotto digitale appaga l'occhio con la grafica curata e la possibilità di visualizzazione in 3D, ma molti guidatori devono assumere una posizione particolare (con il volante molto in basso) per riuscire a vederlo tutto. Nella media l'abitabilità (adeguata per quattro persone di medio-alta statura) e buona la capienza del vano bagagli. Su strada, si apprezzano il comfort (bene l'insonorizzazione e, se si escludono le versioni con gomme superribassate di 18\", anche l'assorbimento delle buche) e la maneggevolezza: la tenuta di strada è notevole.",
                'emissione' => date('Y-m-d', mktime(0, 0, 0, 8, 9, 2023)),
                'scadenza' => date('Y-m-d', mktime(0, 0, 0, 8, 9, 2024)),
                'costoGiornaliero' => 65.00,
            ],
            [
                'id' => 11,
                'targa' => "ZZ111ZZ",
                'modello' => "Huayra",
                'marca' => "Pagani",
                'motore' => "Benzina",
                'cambio' => "Meccanico",
                'bagaglio' => 0,
                'porte' => "2",
                'posti' => "2",
                'autonomia' => 5.5,
                'colore' => "Marrone chiaro",
                'foto' => "storage/auto/11.png",
                "descrizione" => "La Huayra BC è la Huayra Coupé tecnologicamente più avanzata di sempre, che introduce soluzioni tecniche innovative che verranno applicate alle auto Pagani del futuro. Non si tratta semplicemente di un “restyling” della Huayra, ma di un prodotto che prevede modifiche innovative in ogni parte del veicolo. È un'auto che ha una personalità completamente diversa da quella della Huayra Coupé. Concepita principalmente come un'auto da strada in grado di offrire il massimo divertimento e prestazioni durante giornate in pista ed eventi speciali, la Huayra BC è stata ispirata dai suoi predecessori \"focalizzati sulla pista\": la Pagani Zonda R e la Zonda Cinque.",
                'emissione' => date('Y-m-d', mktime(0, 0, 0, 8, 9, 2023)),
                'scadenza' => date('Y-m-d', mktime(0, 0, 0, 8, 9, 2024)),
                'costoGiornaliero' => 4999.99,
            ]

        ]);

        $clienti = Cliente::where("id", ">", 3)->take(5)->get();

        $dataRitiro = Carbon::now();
        $dataConsegna =  Carbon::now()->addMonth();
        for ($i = 0; $i<5; $i++) {
            DB::table('noleggio')->insert([
                'id' => $i+1,
                'clienteID' => $clienti[$i]->id,
                'autoID' => $i+1,
                'importo' => Auto::find($i+1)->costoGiornaliero * date_diff($dataRitiro, $dataConsegna)->days,
                'dataRitiro' => $dataRitiro->toDate(),
                'localitàRitiro' => 'Aeroporto di Ancona-Falconara',
                'oraRitiro' => '08:30',
                'dataConsegna' => $dataConsegna->toDate(),
                'localitàConsegna' => 'Aeroporto di Ancona-Falconara',
                'oraConsegna' => '08:30',
                'attivo' => true,
            ]);

            $dataRitiro->addMonth();
            $dataConsegna->addMonth();
        }


    }
}
