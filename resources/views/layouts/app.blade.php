<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Inclui os assets compilados pelo Vite -->
</head>

<body>
  <header>
    <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          ADS
        </a>
      </div>
    </nav>
  </header>

  <main>
    @yield('content') <!-- Aqui será injetado o conteúdo da página -->
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