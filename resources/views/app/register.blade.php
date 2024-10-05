@extends('layouts.app')

@section('title', 'Get ebook')

@section('content')
<div class="container d-flex flex-column flex-md-row ">
    <div class="container">
        <div class="container-sm d-flex justify-content-center mt-5">
            <h1>Registe-se para receber o livro por email.</h1>
        </div>
        <div class="container mt-3">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid quo commodi qui dolorem voluptates
                veritatis
                facilis voluptatem? Ducimus beatae aut, exercitationem nemo quos molestias voluptas, voluptate quod
                odit,
                cum
                veniam!</p>
        </div>
    </div>


    <div class=" ms-md-5 container-sm d-flex justify-content-center mt-5 mb-5 container-form ">
        <form method="post" action="{{route('app.register.submit')}}">
            @csrf
            <div class="row">
                <div class=" col-lg-12 offset-lg-0">
                    <div class="mb-4">
                        <label for="nome" class="form-label">Nome completo</label>
                        <input value="{{old('nome')}}" name="nome" type="text" class="form-control" id="nome"
                            placeholder="Taylor B. Otwell" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class=" col-lg-12 offset-lg-0">
                    <div class="mb-4">
                        <label for="telefone" class="form-label">Telefone - apenas números </label>
                        <input value="{{old('telefone')}}" name="telefone" type="text" class="form-control"
                            id="telefone" placeholder="DDD + Número" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class=" col-lg-12 offset-lg-0">
                    <div class="mb-4">
                        <label for="email-aluno" class="form-label">Endereço de email</label>
                        <input value="{{old('email')}}" name="email" type="email" class="form-control" id="email-aluno"
                            placeholder="aluno@gmail.com" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class=" col-lg-12 offset-lg-0">
                    <div class="input-group mb-4">
                        <label class="input-group-text" for="uf">UF</label>
                        <select name="uf" class="form-select" id="uf">
                            <option selected disabled>Selecione</option>
                            @ @foreach($estados as $estado)
                            <option value="{{ $estado['sigla'] }}">{{ $estado['nome'] }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class=" col-lg-12 offset-lg-0">
                    <div class=" input-group mb-4">
                        <label class="input-group-text" for="cidade">Cidade</label>
                        <select name="cidade" class="form-select" id="cidade">
                            <option selected disabled>Selecione</option>
                        </select>
                    </div>
                </div>
            </div>




            <div class="mb-3">
                <label class="form-label" for="curso">Selecione o curso que deseja fazer ou que está cursando</label>
                <div class="input-group mb-4">
                    <label class="input-group-text" for="curso">Curso</label>
                    <select name="curso" class="form-select" id="curso">
                        <option selected disabled>Selecione</option>
                        <option value="Ciência da Computação">Ciência da Computação</option>
                        <option value="Engenharia da Computação">Engenharia da Computação</option>
                        <option value="Sistemas de Informação">Sistemas de Informação</option>
                        <option value="Análise e Desenvolvimento de Sistemas">Análise e Desenvolvimento de Sistemas
                        </option>
                        <option value="Desenvolvimento Web">Desenvolvimento Web</option>
                        <option value="Engenharia de Software">Engenharia de Software</option>
                        <option value="Segurança da Informação">Segurança da Informação</option>
                        <option value="Redes de Computadores">Redes de Computadores</option>
                        <option value="Inteligência Artificial">Inteligência Artificial</option>
                        <option value="Análise de Dados">Análise de Dados</option>
                        <option value="Ciência de Dados">Ciência de Dados</option>

                    </select>
                </div>
            </div>
            <div class="row mb-4">
                <div class=" col-lg-12 offset-lg-0">
                    <div class="input-group">
                        <textarea name="menssagem" id="menssagem" class="form-control"
                            aria-label="menssagem">{{ old('menssagem') ? old('menssagem') : 'Deixe sua mensagem aqui.'}}</textarea>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class=" col-auto">
                    <button type="submit" class="btn btn-primary custom-width">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@if(session('success'))
<div class="alert alert-success d-flex fixed-alert justify-content-start align-items-center alert-dismissible fade show"
    role="alert">
    {{session('success')}}
    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if ($errors->any())
<div class="alert alert-warning d-flex justify-content-start align-items-center fixed-alert alert-dismissible fade show"
    role="alert">
    <div class="text-start">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#uf').change(function () {
            var estadoSigla = $(this).val();

            if (estadoSigla) {
                // Habilitar o select de cidades
                $('#cidade').prop('disabled', false);

                // Limpar o select de cidades
                $('#cidade').empty().append('<option value="">Selecione uma cidade</option>');

                // Fazer a requisição AJAX para buscar as cidades
                $.ajax({
                    url: '/register/' + estadoSigla,
                    type: 'GET',
                    success: function (data) {
                        // Preencher o select de cidades
                        $.each(data, function (key, cidade) {
                            $('#cidade').append('<option value="' + cidade.nome + '">' + cidade.nome + '</option>');
                        });
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.error('Erro ao buscar cidades:', textStatus, errorThrown);
                        alert('Erro ao buscar cidades.');
                    }
                });
            } else {
                $('#cidade').prop('disabled', true).empty().append('<option value="">Selecione uma cidade</option>');
            }
        });
    });
</script>