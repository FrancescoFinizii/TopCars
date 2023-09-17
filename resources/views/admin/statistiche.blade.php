@extends("admin.layout.admin-layout")
@section("title", "Statistiche")
@section("content")
    <section class="management-section" style="background-image: url({{url('img/texture.jpg')}})">
        <div class="table-container">
            <div class="table-title">
                <h2>Prospetto Noleggi {{ \Carbon\Carbon::today()->year}}</h2>
            </div>
            <table>
                <thead>
                <tr>
                    <th>Mese</th>
                    <th>Auto Noleggiate</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Gennaio</td>
                        <td>{{ $value[0] }}</td>
                    </tr>
                    <tr>
                        <td>Febbraio</td>
                        <td>{{ $value[1] }}</td>
                    </tr>
                    <tr>
                        <td>Marzo</td>
                        <td>{{ $value[2] }}</td>
                    </tr>
                    <tr>
                        <td>Aprile</td>
                        <td>{{ $value[3] }}</td>
                    </tr>
                    <tr>
                        <td>Maggio</td>
                        <td>{{ $value[4] }}</td>
                    </tr>
                    <tr>
                        <td>Giugno</td>
                        <td>{{ $value[5] }}</td>
                    </tr>
                    <tr>
                        <td>Luglio</td>
                        <td>{{ $value[6] }}</td>
                    </tr>
                    <tr>
                        <td>Agosto</td>
                        <td>{{ $value[7] }}</td>
                    </tr>
                    <tr>
                        <td>Settembre</td>
                        <td>{{ $value[8] }}</td>
                    </tr>
                    <tr>
                        <td>Ottobre</td>
                        <td>{{ $value[9] }}</td>
                    </tr>
                    <tr>
                        <td>Novembre</td>
                        <td>{{ $value[10] }}</td>
                    </tr>
                    <tr>
                        <td>Dicembre</td>
                        <td>{{ $value[11] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
