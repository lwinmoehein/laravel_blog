<nav class="navbar navbar-expand-md bg-primary shadow-lg fixed-top" >
    <div class="container">
        <a class="navbar-brand text-white" href="{{ url('/') }}">
            {{ config('app.name', 'Bloggars') }}
        </a>
        <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="fa fa-bars text-white"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link px-3 py-1" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item mt-2 mt-md-0 ml-0 ml-md-2">
                            <a class="nav-link px-3 py-1" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else

                   <div class="d-flex flex-column flex-md-row px-0 align-items-start align-items-md-center">
                            @yield('action-button')
                    <li class="nav-item dropdown w-100">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle px-3 py-1 mt-2 w-100" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu p-0" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item p-0 px-3 py-1 py-md-1" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                                <i class="fa fa-sign-out ml-2"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                   </div>
                @endguest
            </ul>
        </div>
    </div>
</nav>
