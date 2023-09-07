<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Foto</th>
        <th>Username</th>
        <th>Nome</th>
        <th>Cognome</th>
        <th>Residenza</th>
        <th>Occupazione</th>
        <th>Data di nascita</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @forelse($clienti as $cliente)
        <tr>
            <td>{{ $cliente->id }}</td>
            <td>
                <img class="table-image-preview" width="50" height="50" src="{{ asset($cliente->foto) }}">
            </td>
            <td>{{ $cliente->utente->username }}</td>
            <td>{{ $cliente->nome }}</td>
            <td>{{ $cliente->cognome }}</td>
            <td>{{ $cliente->residenza }}</td>
            <td>{{ $cliente->occupazione }}</td>
            <td>{{ $cliente->dataNascita }}</td>
            <td>
                <button id="{{$cliente->id}}" data-username="{{$cliente->utente->username}}" type="button" class="btn-rect btn-red client-to-delete">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-trash3-fill" viewBox="0 0 16 16">
                        <path
                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                    </svg>
                    Elimina
                </button>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="9">Nessun Risultato</td>
        </tr>
    @endforelse
    </tbody>
</table>
<div class="flex-centered">
    {!! $clienti->links("helpers.pagination") !!}
</div>
