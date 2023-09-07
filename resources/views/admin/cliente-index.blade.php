@extends("admin.layout.admin-layout")
@section("title", "Cliente - Gestione")
@push('javascript')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="{{asset("js/delete-cliente.js")}}"></script>
    <script src="{{asset("js/delete.js")}}"></script>
@endpush
@section("content")
    <section class="management-section" style="background-image: url({{url('img/texture.jpg')}})">
        <div id="form-delete-client" data-url="{{route("cliente.delete")}}">
        </div>
        <div class="table-container">
            <div class="table-title">
                <h2>Gestione Clienti</h2>
                {{ Form::open(["route" => ["cliente.deleteAll"], "method" => "POST"]) }}
                    <button id="delete-all" class="btn-rect btn-red parent-left flex-centered" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path
                                d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                        </svg>
                        Elimina tutti
                    </button>
                {{ Form::close() }}
            </div>
            <div id="table_data" data-route="{{route("cliente.index")}}">
                @include('admin.client-table')
            </div>
        </div>
    </section>
@endsection
