<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DY.ID</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-warning shadow-sm">
            <div class="container">
                @guest
                    <a class="navbar-brand" href="{{ url('/') }}">
                        DY.ID
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                @else
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        DY.ID
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                @endguest

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul>
                        <form action="/search" method="GET">
                            <div class="input-group">
                                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                                aria-describedby="search-addon" name="query_param" style="width:1120px"/>
                                <input class="btn btn-success" type="submit" value="Search" />
                            </div>
                        </form>
                    </ul>
                    
                </div>
            </div>
        </nav>

        <div>
            <nav class="navbar navbar-expand-md navbar-light bg-info">
                <div class="container" style="background-color: rgba(0, 0, 0, 0.3);">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        @guest

                        @else
                            @if(Auth::user()->id == 1)
                                <ul class="navbar-nav me-auto">
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color:white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            Manage Product
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right bg-info" aria-labelledby="navbarDropdown"> 
                                            <a class="dropdown-item" href="{{ url('/admin/view-product') }}" style="color:white; background-color: rgba(0, 0, 0, 0.3);">
                                                View Product
                                            </a>

                                            <a class="dropdown-item" href="{{ url('/admin/insert-product') }}" style="color:white; background-color: rgba(0, 0, 0, 0.3);">
                                                Add Product
                                            </a>
                                        </div>
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color:white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            Manage Category
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right bg-info" aria-labelledby="navbarDropdown"> 
                                            <a class="dropdown-item" href="{{ url('/admin/view-category') }}" style="color:white; background-color: rgba(0, 0, 0, 0.3);">
                                                View Category
                                            </a>

                                            <a class="dropdown-item" href="{{ url('/admin/insert-category') }}" style="color:white; background-color: rgba(0, 0, 0, 0.3);">
                                                Add Category
                                            </a>
                                        </div>
                                    </li>
                                </ul>

                            @else
                                <ul class="navbar-nav me-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/cart') }}" style="color:white">
                                            My Cart
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/history') }}" style="color:white">
                                            History Transaction
                                        </a>
                                    </li>
                                </ul>
                            @endif
                        @endguest

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}" style="color:white">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}" style="color:white">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color:white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right bg-info" aria-labelledby="navbarDropdown"> 
                                        <a class="dropdown-item" href="{{ route('logout') }}" style="color:white; background-color: rgba(0, 0, 0, 0.3);"
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
                    </div>
                </div>
            </nav>
    
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

<footer class="bg-light text-center text-lg-start bg-white shadow-sm" style="bottom:0; width:100%; height: 60px">
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.04);">
    © 2021 Copyright DY20-1
</footer>
</html>
