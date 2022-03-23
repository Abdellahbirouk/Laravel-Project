<!DOCTYPE html>
<title>Fil d'actualité</title>
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
<link href="{{ asset('/css/theme.css') }}" rel="stylesheet">
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>

<div id="app">
  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
          <a class="navbar-brand" href="{{ url('#') }}">
              Majjane Post
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <!-- Left Side Of Navbar -->
              <ul class="navbar-nav me-auto">
                      
              </ul>

              <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ms-auto">
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
                  <li class="nav-item"> 
                    <a class="nav-link" href="{{ route('posts.create') }}">{{ __('Create Post') }}</a>
                  </li>
                  <li class="nav-item"> 
                    <a class="nav-link" href="{{ route('posts.index') }}">{{ __('Home') }}</a>
                  </li>
                      <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{ Auth::user()->firstname }}
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
          </div>
      </div>
  </nav>

</div>

@if (Session::has('message'))
<div class="alert alert-success">
    <h4 style="color: green">{{ session()->get('message') }}</h4>
</div>
@endif

            
    
          @yield('content')
   


        <footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">
            <form action="{{ route('posts.index') }}">
            <input type="submit" class="w3-button w3-black w3-padding-large w3-margin-bottom" value="Revenir à l'accueil &raquo;" />
            </form>
        </footer>
        <script src="{{ asset('/js/app.js') }}" defer></script>
</body>
</html>