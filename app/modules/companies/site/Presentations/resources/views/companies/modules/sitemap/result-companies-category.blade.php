@extends('site::companies.modules.sitemap.app')

@section('main-content')
<section>

    @include('site::companies.partials.search-phone.loadinghtml')

    <div class="container-fluid" data-load="true">

        <div class="row">
        	@if(count($companies) > 0)

            @php
                $company_sponsors = false;
                if($companies->contains('plan_id', '>=', 2)):
                     $company_sponsors = true;
                endif;
            @endphp

            @include('site::companies.partials.search-phone.box-result-search')

            @if($company_sponsors !== true)
              @include('site::companies.partials.search-phone.box-right-side-ads')
            @endif

            {{--
            @include('site::companies.partials.search-phone.box-right-side-ads-classified')
            --}}
          		
        	@else
        		@include('site::companies.partials.search-phone.search-notfoud')
        	@endif
          
        </div>
        <!--end of row-->
    </div>         

</section>

@if(count($companies) > 0)
	@include('site::companies.partials.search-phone.pagination')
@endif

@endsection

@section('breadcrumbs')

    {!! tools_breadcrumbs(route('site.index'), 'Home', false) !!}
    {!! tools_breadcrumbs(route('site.sitemap.seo.cities.state', Request::route('abbr')), strtoupper( Request::route('abbr') ), false) !!}
    {!! tools_breadcrumbs(route('site.sitemap.seo.categories.cities', [ str_slug(Request::route('abbr')), $city->id, str_slug($city->name)]), $city->name) !!}
    {!! tools_breadcrumbs(null, $category->name) !!}

@endsection
