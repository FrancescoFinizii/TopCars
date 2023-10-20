@extends(Auth::user()->utenteable_type == "Admin" ? "admin.layout.admin-layout" : "staff.layout.staff-layout")
@section("title", "Noleggio - Statistiche")
@section("content")
    @if ($errors->any())
        <div class="alert alert-danger centered">
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
    <section class="management-section" style="background-image: url({{url('img/texture.jpg')}})">
        <div class="table-container">
            <div class="table-title">
                <h2>Statistiche Noleggio</h2>
            </div>
            {{ Form::open(["route" => "noleggio.month", "method" => "POST", "class" => "flex-centered noleggio-form"]) }}
            {{ Form::label("mese", "Mese: ") }}
            {{ Form::select("mese", [
                                    0 => "Qualsiasi",
                                    1 => "Gennaio",
                                    2 => "Febbraio",
                                    3 => "Marzo",
                                    4 => "Aprile",
                                    5 => "Maggio",
                                    6 => "Giugno",
                                    7 => "Luglio",
                                    8 => "Agosto",
                                    9 => "Settembre",
                                    10 => "Ottobre",
                                    11 => "Novembre",
                                    12 => "Dicembre"], app('request')->input('mese'), ["class" =>"select-white-theme centered", "onchange" => "this.form.submit()"]) }}
            {{ Form::close() }}

            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Data Ritiro</th>
                    <th>Data Consegna</th>
                    <th>Targa Auto</th>
                    <th>Modello Auto</th>
                    <th>Utente</th>
                </tr>
                </thead>
                <tbody>
                @forelse($noleggi as $noleggio)
                    <tr>
                        <td>{{ $noleggio->id }}</td>
                        <td>{{ \Carbon\Carbon::parse($noleggio->dataRitiro)->format("d-m-Y") }}</td>
                        <td>{{ \Carbon\Carbon::parse($noleggio->dataConsegna)->format("d-m-Y") }}</td>
                        <td>{{ $noleggio->auto->targa }}</td>
                        <td>{{ $noleggio->auto->modello }}</td>
                        <td>{{ $noleggio->cliente->utente->username }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Nessun Risultato</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
