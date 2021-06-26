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
          <a class="navbar-brand" href="#">TodoList</a>

            <ul class=" nav justify-content-end navbar-nav">
              @guest
              <li class="nav-item">
                <a class="nav-link" href="{{route('show.login')}}">{{ __('Login') }}</a>
              </li>
              {{-- <li class="nav-item">
                  <a class="nav-link" href="{{route('register')}}">Register</a>
              </li> --}}
              @else
              <li class="nav-item ">
                  <a class="nav-link" href="{{ route('logout') }}">
                      {{ __('Logout') }}
                  </a>
              </li>
              @endguest
            </ul>
        </div>
      </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>



