@extends('site::companies.modules.page-company.app')

@section('main-content')
<section>

    <div class="container">

        <div class="row" style="padding:10px;">
            <h1 style="font-size: 36px;">Mapa do Site - Cidades em {{ strtoupper( Request::route('abbr')) }}</h1>
        </div>

        <div class="row">

            <table class="border--round">
                <thead>
                    <tr>
                        <th>Cidade</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($cities as $city)
                    <tr>
                        <td><a href="{{ route('site.sitemap.seo.categories.cities', [strtolower(Request::route('abbr')), $city->id, str_slug( $city->name ) ] ) }}.html" title="{{ $city->name }}">{{ $city->name }}</a></td>
                        <td>{{ $city->state->name }}</td>
                    </tr>
                    @endforeach 
   
                </tbody>
            </table>

            
        </div>

        <div class="row">
            {!! $cities->render() !!}
        </div>
    </div>
</section>
@endsection

@section('breadcrumbs')

    {!! tools_breadcrumbs(route('site.index'), 'Home', false) !!}
    {!! tools_breadcrumbs(route('site.sitemap.seo'), 'Mapa do Site', false) !!}
    {!! tools_breadcrumbs(null, strtoupper( Request::route('abbr') ), false) !!}
    

@endsection
