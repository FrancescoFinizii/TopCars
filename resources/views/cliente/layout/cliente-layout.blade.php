<!DOCTYPE html>
<html lang="it">
<head>
    <title>
        @yield("title")
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset("js/script.js")}}"></script>
    <script type="text/javascript" src="{{asset("js/cliente.js")}}"></script>
    <link rel="stylesheet" href="{{asset ("css/elements.css") }}">
    <link rel="stylesheet" href="{{asset ("css/style.css") }}">
</head>
<body>
@include("public.navbar.main-navbar")
<div class="texture" style="background-image: url({{url('img/background3.jpg')}})">
    @if ($errors->any())
        <div class="alert alert-danger">
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
    @if ($message = Session::get('success'))
        <p class="alert alert-success">{{ $message }}</p>
    @endif
    <div class="wrapper-dashboard">
        <div class="left-menu">
            <h2>{{Auth::user()->username}}</h2>
            {{ Form::open(array('route' => 'cliente.update.image', 'method' => 'PUT', "enctype" => "multipart/form-data", "onchange" => "this.submit()")) }}
            @include("helpers.image-item", ["size" => "200px", "path" => Auth::user()->utenteable->foto, "id"=> "foto"])
            {{ Form::close() }}
            @include("cliente.navbar.cliente-navbar")
        </div>
        <div class="right-menu">
            <div class="schede">
                @yield("content")
            </div>
        </div>
    </div>
</div>
@include("helpers.footer")
</body>
</html>
