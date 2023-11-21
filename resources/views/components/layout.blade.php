<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Kids Cash</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        @livewireStyles
    </head>

    <body>

        <!-- Main Body Container -->
        <div class="container-fluid">
            <div class="row">
                <!-- Left column (sidebar) -->
                <div class="col-2 col-sm-2 min-vh-100" id="sidebar">
                    <ul class="nav mt-4 flex-column align-content-center">
                        <li class="nav-item py-2 py-sm-0">
                            <a class="nav-link" href="/rooms">
                                <div class="logo-container">
                                    <img class="img-fluid" alt="Woodlake Kids logo" src={{URL::asset('/images/logo.png')}}>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0">
                            <a class="nav-link d-sm-inline-block" href="/rooms">
                                <i class="bi bi-house "><span class="ms-2 d-none d-sm-inline">Rooms</span></i>
                            </a>
                        </li>

                        @if(Auth::user()->role == 1)
                        <li class="nav-item py-2 py-sm-0">
                            <a class="nav-link d-sm-inline-block" href="/admin">
                                <i class="bi bi-person-fill-gear "><span class="ms-2 d-none d-sm-inline">Admin</span></i>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>

                <!-- Middle Column main content column -->
                <div class="col-10 col-sm-10 pt-3" id="main-content">
                    {{-- <div class="col-12 bg-white ">
                            <h3>Woodlake Kids</h3>

                        </div> --}}
                    <ul class="nav float-end">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>

                    {{-- Put your main content here --}}
                   {{$slot}}
                </div>
            </div>
        </div>
        @livewireScripts
        @include('sweetalert::alert')
        @stack('scripts')
    </body>
</html>
