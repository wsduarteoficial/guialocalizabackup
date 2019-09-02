@extends('site::companies.modules.page-company.app')

@section('main-content')
<section>

    <div class="container">

        <div class="row" style="padding:10px;">
            @if(isset($city->name) && !empty($city->name))
                <h1 style="font-size: 36px;">Mapa do Site - Categorias na Cidade de {{ $city->name }} em {{ strtoupper( Request::route('abbr')) }}</h1>
            @else
                <h1 style="font-size: 36px;">Mapa do Site - Categorias no Estado de {{ strtoupper( Request::route('abbr')) }}</h1>
            @endif
        </div>

        <div class="row">

            <table class="border--round">
                <thead>
                    <tr>
                        <th>Categorias</th>
                        <th>Cidade / Estado</th>
                    </tr>
                </thead>
                <tbody>          
                    
                    @foreach($categories as $category)
                    <tr>                           
                        <td><a href="{{ route('site.sitemap.seo.category.companies', [ str_slug(Request::route('abbr')), $city->id, str_slug( @$city->name),$category->id, str_slug( $category->name ) ],  $category->name) }}.html" title="{{ $category->name }}">{{ $category->name }}</a></td>
                        <td>{{ @$city->name }} / {{ strtoupper( Request::route('abbr')) }} </td>
                    </tr>
                    @endforeach 
   
                </tbody>
            </table>

            
        </div>

        <div class="row">
            {!! $categories->render() !!}
        </div>
    </div>
</section>
@endsection

@section('breadcrumbs')

    {!! tools_breadcrumbs(route('site.index'), 'Home', false) !!}
    {!! tools_breadcrumbs(route('site.sitemap.seo.cities.state', Request::route('abbr')), strtoupper( Request::route('abbr') ), false) !!}
    {!! tools_breadcrumbs(null, @$city->name) !!}

@endsection
