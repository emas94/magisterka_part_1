
<nav id="navbar" class="navbar navbar-expand-sm navbar-dark sticky " style="overflow: visible; z-index: 2; background: black;">
    <div class="container" style="background: black">
        <a href="/" class="navbar-brand"><img src="../img/logo.jpg" class="logomobile logodesktop"    alt="logo"></a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse" >
            <span class="navbar-toggler-icon">  </span>
        </button>
        <div class="collapse navbar-collapse mobilecenter" id="navbarCollapse" style="margin-right: 15%">
            <u1 class="navbar-nav ml-auto">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a href="{{ url('/') }}" class="nav-link" >Strona Główna</a>
                </li>
                <li class="nav-item {{ Request::is('o_nas') ? 'active' : '' }}">
                    <a href="/o_nas" class="nav-link">O nas</a>
                </li>
                <li class="nav-item {{ Request::is('kontakt') ? 'active' : '' }}">
                    <a href="{{ url('/kontakt') }}" class="nav-link">Kontakt</a>
                </li>
    </ul>

                <!-- Authentication Links -->
                @guest

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Logowanie') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Rejestracja') }}</a>
                        </li>
                    @endif
                @else

                    <li class="nav-item dropdown" style="overflow: visible">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-danger" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->login }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">



                        <a href="{{ url('home') }}"class="dropdown-item {{ Request::is('home') ? 'active' : '' }}">Strefa klienta</a>


                        <a href="{{ url('/admin/paneladministratora') }}" class="dropdown-item {{ Request::is('admin/paneladministratora') ? 'active' : '' }}">Panel administratora</a>

                            <a href="{{ url('/organizator/panelorganizatora') }}" class="dropdown-item {{ Request::is('organizator/panelorganizatora') ? 'active' : '' }}">Panel organizatora</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Wyloguj') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>



                        </div>
                    </li>
                @endguest


                <li class="ml-3 mt-2">  <a href="https://instagram.com/emas_94">
                        <i class="fab fa-instagram"></i>
                    </a></li>
                <li class="ml-3 mt-2">   <a href="https://twitter.com/emas1994">
                        <i class="fab fa-twitter"></i>
                    </a></li>
                <li class="ml-3 mt-2"><a href="https://facebook.com/emas1994">
                        <i class="fab fa-facebook"></i>
                    </a></li>
            </u1>
        </div>

    </div>
</nav>
