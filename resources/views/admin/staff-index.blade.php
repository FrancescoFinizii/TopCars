@extends("admin.layout.admin-layout")
@section("title", "Staff - Gestione")
@push('javascript')
    <script src="{{asset("js/delete.js")}}"></script>
@endpush
@section("content")
    <section class="management-section" style="background-image: url({{url('img/texture.jpg')}})">
        <div class="table-container">
            <div class="table-title">
                <h2>Gestione Staff</h2>
                <a href="{{route("staff.create")}}" class="parent-left btn-rect btn-green flex-centered">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                    </svg> Aggiungi
                </a>
            </div>
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Foto</th>
                    <th>Username</th>
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($staffs as $staff)
                    <tr>
                        <td>{{ $staff->id }}</td>
                        <td>
                            <img class="table-image-preview" width="50" height="50" src="{{ asset($staff->foto) }}">
                        </td>
                        <td>{{ $staff->utente->username }}</td>
                        <td>{{ $staff->nome }}</td>
                        <td>{{ $staff->cognome }}</td>
                        <td class="action">
                            <div class="action-cont flex-centered">
                                <a href="{{route("staff.edit", $staff->id)}}" class="btn-rect btn-blue">
                                    <div class="flex-centered">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd"
                                                  d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                        Modifica
                                    </div>
                                </a>
                                {{ Form::open(["route" => ["staff.destroy", $staff], "method" => "DELETE" ]) }}
                                <button id="{{$staff->id}}" type="button" class="btn-rect btn-red item-to-delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                    </svg>
                                    Elimina
                                </button>
                                {{Form::close()}}
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Nessun Risultato</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{ $staffs->links("helpers.pagination") }}
        </div>
    </section>
@endsection
