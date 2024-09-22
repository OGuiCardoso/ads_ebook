@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column flex-md-row">
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


    <div class="container-sm d-flex justify-content-center mt-5 mb-5">
        <form>
            <div class="row">
                <div class=" col-lg-12 offset-lg-0">
                    <div class="mb-3">
                        <label for="nome-aluno" class="form-label">Nome completo</label>
                        <input type="text" class="form-control" id="nome-aluno">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class=" col-lg-12 offset-lg-0">
                    <div class="mb-3">
                        <label for="email-aluno" class="form-label">Endereço de email</label>
                        <input type="email" class="form-control" id="email-aluno">

                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="curso">Selecione o curso que deseja fazer ou que está cursando</label>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="curso">Curso</label>
                    <select class="form-select" id="curso">
                        <option selected>Selecione</option>
                        <option value="ciencia_da_computacao">Ciência da Computação</option>
                        <option value="engenharia_da_computacao">Engenharia da Computação</option>
                        <option value="sistemas_de_informacao">Sistemas de Informação</option>
                        <option value="analise_e_desenvolvimento">Análise e Desenvolvimento de Sistemas</option>
                        <option value="desenvolvimento_web">Desenvolvimento Web</option>
                        <option value="engenharia_de_software">Engenharia de Software</option>
                        <option value="seguranca_da_informacao">Segurança da Informação</option>
                        <option value="redes_de_computadores">Redes de Computadores</option>
                        <option value="inteligencia_artificial">Inteligência Artificial</option>
                        <option value="analise_de_dados">Análise de Dados</option>
                        <option value="ciencia_de_dados">Ciência de Dados</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 offset-md-0">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection