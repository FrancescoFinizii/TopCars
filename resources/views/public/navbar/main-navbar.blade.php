<nav id="main-nav" class="main-nav flex-between">
    <a href="{{route('home')}}">
        <img src="{{asset("img/TopCars-logo.png")}}" width="200" height="100">
    </a>
    <button type="button" id="navbar-toggler">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list"
             viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                  d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg>
    </button>
    <div id="main-nav-link" class="main-nav-link">
        <ul class="flex-between">
            <li><a href="{{route('home')}}" class="nav-link">Home</a></li>
            <li><a href="{{route('catalogo')}}" class="nav-link">Catalogo</a></li>
            <li><a href="{{route('faq')}}" class="nav-link">FAQ</a></li>
            @auth
            <li><a href="@can("isClient"){{route("cliente.edit.profile")}} @endcan @can("isStaff"){{route("auto.index")}} @endcan @can("isAdmin"){{route("cliente.index")}} @endcan" class="nav-link">My Area</a></li>
            @endauth
        </ul>
    </div>
    <div class="main-nav-link-btn" id="main-nav-link-btn">
        @guest
            <a id="btn-login" class="btn-rect btn-outline-dark" href="{{route("login")}}">Log in</a>
            <a id="btn-signup" class="btn-rect btn-light" href="{{route("register")}}">Sign up</a>
        @else
            <a id="btn-logout" class="btn-rect btn-outline-dark" href="{{route("logout")}}">Logout</a>
        @endguest
    </div>
</nav>

