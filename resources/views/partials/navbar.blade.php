<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/" style="color:#777"><span style="font-size:15pt"></span> <i class="fa fa-video-camera" aria-hidden="true"> Videoclub</i></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="navbar-nav ml-auto">
            @guest
            <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        <div class="dropdown">
          <button style="color:#777" class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Lenguage
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a style="color:#777" class="dropdown-item" href="{{ url('lang/en') }}">EN</a>
                <a style="color:#777" class="dropdown-item" href="{{ url('lang/es') }}">ES</a>
          </div>
        </div>
            @endguest
        </ul>



        @if(Auth::check())
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ Request::is('catalog') && ! Request::is('catalog/create')? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/catalog')}}">
                            <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                            <i class="fa fa-film" aria-hidden="true"> Catálogo</i>
                        </a>
                    </li>
                    @if(auth()->user()->is_admin == 1)
                    
                        <li class="nav-item {{  Request::is('catalog/create') ? 'active' : ''}}">
                            <a class="nav-link" href="{{url('/catalog/create')}}">
                                <i class="fa fa-plus" aria-hidden="true"> Nueva película</i>
                            </a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"><i class="fa fa-user-plus" aria-hidden="true"> {{ __('Register') }}</i></a>
                        </li>
                        @endif
                    
                    @endif
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fa fa-user" aria-hidden="true"> {{ Auth::user()->name }}</i><span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                               {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        @endif
    </div>
</nav>
