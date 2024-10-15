@extends('layouts.app')

@section('title', 'Get ebook')

@section('content')



<div class="container d-flex flex-column flex-md-row ">
    <div class="container">
        <div class="container-sm d-flex justify-content-center mt-5">
            <h1 class="titles">Registre-se e receba o nosso ebook interativo!</h1>
        </div>

        <div class="container mt-3">
            <p>Quer aprender mais sobre as oportunidades e desafios na área da tecnologia? Preparamos um ebook
                interativo que vai ajudá-lo a explorar o mundo da tecnologia de forma prática e envolvente.</p>
            <p>Este ebook foi feito para alunos, como você, que querem entender melhor o mercado de trabalho e descobrir
                como definir sua área de atuação. Com dicas valiosas e reflexões sobre o uso da inteligência artificial,
                você vai se preparar para os desafios e se destacar no seu caminho profissional.</p>
        </div>

        <div class="container mt-5">
            <h3 class="titles">O que este livro contém?</h3>
            <p>Este ebook interativo traz uma visão completa do mundo da tecnologia, abordando:</p>
            <ul>
                <li>Insights sobre as diversas áreas de atuação dentro da tecnologia;</li>
                <li>Dicas práticas para enfrentar os desafios do mercado;</li>
                <li>A importância de escolher a área certa para seu perfil;</li>
                <li>Como a inteligência artificial pode ser sua aliada no desenvolvimento profissional.</li>
            </ul>
        </div>

    </div>


    <div class=" ms-md-5 container-sm d-flex justify-content-center mt-5 mb-5 container-form ">
        <form method="POST" action="{{route('app.register.submit')}}">
            @csrf
            <div class="row">
                <div class=" col-lg-12 offset-lg-0">
                    <div class="mb-4">
                        <label for="nome" class="form-label">Nome completo</label>
                        <input value="{{old('nome')}}" name="nome" type="text" class="form-control" id="nome"
                            placeholder="Taylor B. Otwell">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class=" col-lg-12 offset-lg-0">
                    <div class="mb-4">
                        <label for="telefone" class="form-label">Telefone - apenas números </label>
                        <input value="{{old('telefone')}}" name="telefone" type="text" class="form-control"
                            id="telefone" placeholder="DDD + Número">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class=" col-lg-12 offset-lg-0">
                    <div class="mb-4">
                        <label for="email-aluno" class="form-label">Endereço de email</label>
                        <input value="{{old('email')}}" name="email" type="email" class="form-control" id="email-aluno"
                            placeholder="aluno@gmail.com">
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
                <div class=" col-12">
                    <button type="submit" class="btn btn-primary btn-block w-100 custom-width">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="container mt-5 mb-5 d-flex flex-column justify-content-center align-items-center">
    <h3 class="titles">Por que escolher a área de tecnologia?</h3>
    <p>A tecnologia é um dos setores mais dinâmicos e promissores do mercado. Com inovações constantes e uma
        demanda crescente por profissionais qualificados, esta é a área ideal para quem busca um futuro
        desafiador e recompensador. Ao escolher a área certa, você pode construir uma carreira sólida,
        contribuir com soluções inovadoras e estar sempre à frente em um mercado em constante evolução.</p>
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