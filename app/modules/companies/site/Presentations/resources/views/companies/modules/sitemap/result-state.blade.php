@extends('site::companies.modules.page-company.app')

@section('main-content')
<section>

    <div class="container">

        <div class="row" style="padding:10px;">
            <h1 style="font-size: 36px;">Mapa do Site</h1>
        </div>

        <div class="row">

            @foreach($states as $state)

            <div class="col-sm-4">

                <div class="boxed boxed--border">
                    <h5>{{ $state->name }}</h5>
                    <p>
                        Clique em listar para abrir as cidades em {{ $state->abbr }}, depois navegue pelas categorias.
                    </p>
                    <a title="Listar cidades em {{ $state->abbr }}" class="btn btn--primary" href="{{ route('site.sitemap.seo.cities.state', strtolower( $state->abbr ) ) }}">
                        <span class="btn__text">
                            Listar cidades em {{ $state->abbr }}
                        </span>
                    </a>
                </div>
                <!--end feature-->
            </div>
            @endforeach

        </div>

    </div>

</section>
@endsection

@section('breadcrumbs')

    {!! tools_breadcrumbs(route('site.index'), 'Home', false) !!}

@endsection
