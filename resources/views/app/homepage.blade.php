@extends('layouts.app')


@section('title', 'Home')

@section('content')

<div class="container d-flex mt-5 justify-content-center flex-column ">
    <div class="d-flex justify-content-center">
        <h1 class="titles text-center">Desvende o Mundo da Tecnologia com Nosso Ebook Interativo</h1>
    </div>

    <div class="d-flex justify-content-center mt-5 mb-5">
        <a href="{{route('app.register')}}" class="button-85">Baixe Agora</a>
    </div>

</div>
<section>

    <div class="container mt-5 flex-column ">
        <div class="d-flex justify-content-center">
            <h2 class="titles mb-5">O Que Você Vai Aprender</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <i class="fas fa-robot"></i>
                <h4>Inteligência Artificial</h4>
                <p>Como a IA está mudando o mundo da tecnologia e suas oportunidades.</p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-lightbulb"></i>
                <h4>Dicas Práticas</h4>
                <p>Soluções para enfrentar desafios comuns e avançar na carreira.</p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-laptop-code"></i>
                <h4>Escolha sua Área</h4>
                <p>Descubra as diferentes áreas de atuação e escolha a ideal para você.</p>
            </div>
        </div>
    </div>


    <div class="container mt-5">
        <h2 class="titles">Por Que Baixar Este Ebook?</h2>
        <ul>
            <li>Conteúdo direto e prático, feito por estudantes para estudantes.</li>
            <li>Insights valiosos para quem quer iniciar ou mudar de área na tecnologia.</li>
            <li>Dicas exclusivas sobre como aproveitar a inteligência artificial no seu desenvolvimento profissional.
            </li>
        </ul>
    </div>
</section>
<section>
    <div class=" container d-flex flex-column mt-3 mb-5 ">
        <h2 class="titles mb-3 mt-5">Quem somos nós?</h2>
        <div class="row">
            <div class="col-md-4 d-flex justify-content-center mb-5">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content. me quick example text to build on the card title and make up the bulk of
                            the card's content</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex justify-content-center mb-5">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex justify-content-center mb-5">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


@endsection