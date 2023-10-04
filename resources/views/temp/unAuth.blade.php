<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url('/')}}">Sanhook</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}">Home
                        <span class="visually-hidden">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/products')}}">products</a>
                </li>
            </ul>
            <form class="d-flex" method="post">
                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="nav-item">Dashboard</a>
                            <a href="{{ route('logout')  }}" class="nav-item">logout</a>
                        @else
                            <a href="{{ route('login') }}" class="nav-item">Log in</a>
                        @endauth
                    </div>
                @endif
            </form>
        </div>
    </div>
</nav>
