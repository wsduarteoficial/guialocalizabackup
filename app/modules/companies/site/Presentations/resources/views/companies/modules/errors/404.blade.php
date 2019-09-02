@extends('site::companies.modules.home.app')

@section('main-content')

<div class="main-container">
    <section class="height-80 text-center">
        <div class="container pos-vertical-center">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="h1--large">Error 404</h1>
                    <p class="lead">
Desculpe, mas a página que você estava tentando ver não existe mais!
                    </p>
                    <a href="{{ url('/') }}">Volte para a página inicial</a>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
</div>
@endsection
