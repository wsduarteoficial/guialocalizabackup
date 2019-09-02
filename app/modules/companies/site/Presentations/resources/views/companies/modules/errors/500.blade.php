@extends('site::companies.modules.home.app')

@section('main-content')

<div class="main-container">
    <section class="height-80 text-center">
        <div class="container pos-vertical-center">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="h1--large">Error 500</h1>
                    <p class="lead">
                        Ocorreu um erro inesperado impedindo a página de carregar.
                    </p>
                    <a href="{{ url('/') }}">Volte para a página inicial</a> | <a href="{{ url('/login') }}">Entrar</a>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
</div>
@endsection
