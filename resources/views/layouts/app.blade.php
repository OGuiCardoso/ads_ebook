<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Inclui os assets compilados pelo Vite -->
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar bg-dark border-bottom border-body" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{route('app.homepage')}}">
          ADS
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link {{Route::currentRouteName() == 'app.homepage' ? 'active' : ''}}"
                href="{{route('app.homepage')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{Route::currentRouteName() == 'app.register' ? 'active' : ''}}"
                href="{{route('app.register')}}">Ebook</a>
            </li>
          </ul>
        </div>
    </nav>
  </header>

  <main>
    @yield('content')
  </main>

  <footer>
    <div class="card">
      <div class="card-body bg-dark border-bottom border-body" data-bs-theme="dark">
        <p class="card-text text-white bg-dark">© 2024 Meu Site. Todos os direitos reservados.</p>
      </div>
    </div>
  </footer>
</body>

</html>