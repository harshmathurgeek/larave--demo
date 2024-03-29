<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" >

    <title>Laravel </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">    
  
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              @guest
              <li class="nav-item">
                <a class="nav-link {{ (request()->is('login')) ? 'active' : '' }}" href="{{ url('public') }}">Tasks</a>
             </li>
              <li class="nav-item">
                  <a class="nav-link {{ (request()->is('login')) ? 'active' : '' }}" href="{{ url('login') }}">Login</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ (request()->is('register')) ? 'active' : '' }}" href="{{ url('register') }}">Register</a>
              </li>
          @else    
              <a class="navbar-brand" href="{{ URL('index') }}"> Welcome <b>{{ Auth::user()->name }} </b></a>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('index') }}">MyTask</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ url('public') }}">PublicTask</a>
              </li>

              <li class="nav-item   ">
                <a class="nav-link " href="{{ url('logout') }}">Logout</a>
              </li>
            @endguest
            </ul>
          </div>
          
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
            </ul>
          </div>
        </div>
    </nav>    

    <div class="container">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script></body>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    @yield('scripts')

</html>