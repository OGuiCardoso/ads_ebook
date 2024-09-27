<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Ebook ADS')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{asset('/icons/css/style.css')}}">

  @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Inclui os assets compilados pelo Vite -->
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar bg-dark border-bottom border-body custom-color-nav-foot"
      data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{route('app.homepage')}}">
          ADS EBOOK
        </a>

        <button class=" navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{Route::currentRouteName() == 'app.homepage' ? 'active' : ''}}"
                href="{{route('app.homepage')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{Route::currentRouteName() == 'app.register' ? 'active' : ''}}"
                href="{{route('app.register')}}">Ebook</a>
            </li>
          </ul>
          <div class="navbar-nav ms-auto d-flex flex-row">

            <a href="https://github.com/OGuiCardoso" target="_blank" rel="noopener noreferrer">
              <img class="svg-icon" src="{{ asset('icons/images/github.svg') }}" alt="GitHub Logo">
            </a>


            <a class="ms-2 me-2" href="https://www.linkedin.com/in/guilherme-moraes-636061181/" target="_blank"
              rel="noopener noreferrer">
              <img class="svg-icon" src="{{ asset('icons/images/linkedin.svg') }}" alt="Linkedim Logo">
            </a>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <main>
    @yield('content')
  </main>

  <footer class="text-center text-lg-start bg-dark text-muted custom-color-nav-foot" data-bs-theme="dark">
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom flex-column flex-sm-row">
      <div class="me-sm-5 ">
        <span>&copy; <strong>Guilherme C. Moraes</strong> - Todos os direitos reservados.</span>
        <br>
        <small>2024 | Desenvolvedor Web</small>
      </div>
      <div class="d-flex justify-content-center">

        <a href="https://github.com/OGuiCardoso" target="_blank" rel="noopener noreferrer">
          <img class="svg-icon" src="{{ asset('icons/images/github.svg') }}" alt="GitHub Logo">
        </a>


        <a class="ms-1" href="https://www.linkedin.com/in/guilherme-moraes-636061181/" target="_blank"
          rel="noopener noreferrer">
          <img class="svg-icon" src="{{ asset('icons/images/linkedin.svg') }}" alt="Linkedim Logo">
        </a>
      </div>
    </section>
  </footer>

  @section('scripts')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js">
    jQuery.noConflict();
    jQuery(document).ready(function () {
      console.log('jQuery está carregado e o documento está pronto.');
      $('#uf').change(function () {
        let estadoId = $(this).val(); // Pega o ID do estado selecionado

        // Limpa o campo de cidades e desativa temporariamente
        $('#cidade').empty().append('<option selected disabled>Carregando...</option>').prop('disabled', true);

        // Faz a requisição AJAX para buscar as cidades daquele estado
        $.ajax({
          url: '/register/' + estadoId, // Rota que vai buscar as cidades
          method: 'GET',
          success: function (response) {
            // Limpa e preenche o select de cidades com as opções retornadas
            $('#cidade').empty().append('<option selected disabled>Selecione uma cidade</option>');

            // Itera pelas cidades e as adiciona como opções
            $.each(response, function (key, cidade) {
              $('#cidade').append('<option value="' + cidade.id + '">' + cidade.nome + '</option>');
            });

            // Habilita o campo de seleção de cidades
            $('#cidade').prop('disabled', false);
          },
          error: function () {
            alert('Erro ao buscar cidades!');
          }
        });
      });
    });
  </script>

</body>

</html>