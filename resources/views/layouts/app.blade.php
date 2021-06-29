<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @stack('style')
    <title>Document</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="container-fluid">
            @if (Auth::check())
            <a class="navbar-brand" href="{{url('/task')}}">TodoList</a>
            @else
            <a class="navbar-brand" href="{{url('/')}}">TodoList</a>
            @endif
            <ul class=" nav justify-content-end navbar-nav">
              @guest
              <li class="nav-item">
                <a class="nav-link" href="{{route('show.login')}}">{{ __('Login') }}</a>
              </li>

              <li class="nav-item">
                  <a class="nav-link" href="{{url('/register/create')}}">Register</a>
              </li>

              @else
              <li class="nav-item navbar-brand">
                    {{__(Auth::user()->name)}}
              </li>
              <li class="nav-item ">
                  <a class="nav-link" href="{{ route('logout') }}">
                      {{ __('Logout') }}
                  </a>
              </li>
              @endguest
            </ul>
        </div>
      </nav>
    @yield('content')
    @stack('custom-script')
</body>
</html>



