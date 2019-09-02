@php

$place_name = '';
if(isset($company->place->name)):
    $place_name = $company->place->name;
endif;

$numeral = '';
if(isset($company->numeral)):
    $numeral = $company->numeral;
endif;

$complement = '';
if(isset($company->complement)):
    $complement = $company->complement;
endif;

$zip_code = '';
if(isset($company->zipcode->code)):
    $zip_code = $company->zipcode->code;
endif;

$state_abbr = $state_name  ='';
if(isset($company->state->abbr)):
    $state_abbr = $company->state->abbr;
    $state_name = $company->state->name;
endif;

$city_name = '';
$city_id = '';
if(isset($company->city->name)):
    $city_name = $company->city->name;
    $city_id = $company->city->id;
endif;

$district_name = '';
if(isset($company->district->name)):
    $district_name = $company->district->name;
endif;

$category_name = '';
@endphp

@desktop
<div class="col-md-4 col-md-push-8">
    <div class="boxed boxed--border">
        <div class="map-container border--round" data-maps-api-key="AIzaSyCR6RjMxErqPwXcAUetRydNjjO8u8cEJTk" data-address="{{ tools_address_google_maps(@$place_name, @$numeral, @$district_name, $city_name, @$state_abbr, @$zip_code) }}" data-marker-title="{{ trim( $company->name_fantasy ) }}" data-map-style="[{&quot;featureType&quot;:&quot;landscape&quot;,&quot;stylers&quot;:[{&quot;hue&quot;:&quot;#FFBB00&quot;},{&quot;saturation&quot;:43.400000000000006},{&quot;lightness&quot;:37.599999999999994},{&quot;gamma&quot;:1}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;stylers&quot;:[{&quot;hue&quot;:&quot;#FFC200&quot;},{&quot;saturation&quot;:-61.8},{&quot;lightness&quot;:45.599999999999994},{&quot;gamma&quot;:1}]},{&quot;featureType&quot;:&quot;road.arterial&quot;,&quot;stylers&quot;:[{&quot;hue&quot;:&quot;#FF0300&quot;},{&quot;saturation&quot;:-100},{&quot;lightness&quot;:51.19999999999999},{&quot;gamma&quot;:1}]},{&quot;featureType&quot;:&quot;road.local&quot;,&quot;stylers&quot;:[{&quot;hue&quot;:&quot;#FF0300&quot;},{&quot;saturation&quot;:-100},{&quot;lightness&quot;:52},{&quot;gamma&quot;:1}]},{&quot;featureType&quot;:&quot;water&quot;,&quot;stylers&quot;:[{&quot;hue&quot;:&quot;#0078FF&quot;},{&quot;saturation&quot;:-13.200000000000003},{&quot;lightness&quot;:2.4000000000000057},{&quot;gamma&quot;:1}]},{&quot;featureType&quot;:&quot;poi&quot;,&quot;stylers&quot;:[{&quot;hue&quot;:&quot;#00FF6A&quot;},{&quot;saturation&quot;:-1.0989010989011234},{&quot;lightness&quot;:11.200000000000017},{&quot;gamma&quot;:1}]}]" data-map-zoom="15"></div>
    </div>
</div>
@enddesktop

<div class="col-md-8 col-md-pull-4">

    <div class="row boxed">

        <div itemscope itemtype="http://schema.org/LocalBusiness">

            <div>
                @if (Auth::check())
                    <h1 itemprop="name" style="font-size: 36px;">{{ $company->name_fantasy }}

                        <a rel="nofollow" href="{{ route('admin.companies.edit', $company->id) }}" target="_blank" title="Editar cadastro" class="type--fine-print color--primary-2">

                            <i class="material-icons">
                                    mode_edit
                            </i>
                        </a>

                    </h1>
                @else
                    <h1 itemprop="name" style="font-size: 36px;">{{ $company->name_fantasy }}</h1>
                @endif
                <p class="lead">

                    @if(!empty($company->description))
                        {!! nl2br(  $company->description )  !!}
                    @endif
                    
                </p>
            </div>

            <div>

                <p class="lead">
                    @include('site::companies.modules.page-company.components.socials')
                </p>

                @if(!empty($company->phones))

                <p class="lead">

                    @php
                    $collection = collect($company->phones);
                    $sorted = $collection->sortBy('number');
                    @endphp

                    @foreach($sorted->values()->all() as $phone)

                        @if($phone->type=='fixed')
                            Tel.:  <span itemprop="telephone">{{ tools_mask($phone->number, '(##) ####-####')}}</span>
                        @elseif($phone->type=='cell')
                            Cel.:  <span itemprop="telephone">{{ tools_mask($phone->number, '(##) #####-####')}}</span>
                        @else
                                <span itemprop="telephone">{{ $phone->number }}</span>
                        @endif

                        @mobile
                        &nbsp;&nbsp;
                        <a href="tel:0{{ $phone->number }}"><span class="btn btn-success btn--xs btn__text turn-on">Ligar</span></a>

                        <br />

                        @endmobile
                        <br />

                    @endforeach

                </p>

                @endif

                @if(isset( $company->categories ))
                <p>
                    Em
                    @foreach($company->categories as $category)
                        @if (isset($category->id))

                            <a rel="nofollow" href="{{ asset( tools_slug_category_companies($company->state->abbr, $company->city->name, $company->city->id, $category->name, $category->id) ) }}"
                            title="{{ $category->name }}" class="category pull-letf">{{ $category->name }}</a>

                            @php
                            $category_name = $category->name;
                            $category_id = $category->id;
                            @endphp

                        @endif
                    @endforeach

                    <a rel="nofollow" class="btn btn--default btn--xs pull-right" href="{{ route('site.solicitation.change', [$company->company_uuid, base64_encode( asset( tools_slug_title_companies($state_abbr, $city_id, $city_name, $district_name, $company->name_fantasy, $company->id) ) )] ) }}">
                        <span class="btn__text"><i class="material-icons">mode_edit</i> Solicitar alteração</span>
                    </a>
                </p>
                @endif
                <div class="text-left" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">

                    <span itemprop="streetAddress">

                        @if(!empty($place_name))
                            {{ $place_name }},
                        @endif

                        @if(!empty($company->numeral))
                            {{ $company->numeral }},
                        @endif

                        @if(!empty($district_name))
                            {{ $district_name }}
                        @endif

                        @if(!empty($company->complement))
                            - "{{ $company->complement }}"
                        @endif

                    </span>

                    <br>

                    @if( isset( $zip_code ) )

                        CEP
                        <span itemprop="postalCode">
                        {{ $zip_code }}
                        </span> -

                    @endif

                    @if( isset( $city_name, $state_abbr ) )
                        <span itemprop="addressLocality">
                            {{ $city_name }}, {{ $state_abbr }}
                        </span>
                    @endif


                </div>

            </div>

        </div>

    </div>

    @include('site::companies.modules.page-company.components.photo')
    @include('site::companies.modules.page-company.components.contact')


</div>

@section('breadcrumbs')

    {!! tools_breadcrumbs(route('site.index'), 'Home', false) !!}
    {!! tools_breadcrumbs(route('site.sitemap.seo.cities.state', str_slug($state_abbr)), $state_abbr, false) !!}
    {!! tools_breadcrumbs(route('site.sitemap.seo.categories.cities', [ str_slug($state_abbr), $city_id, str_slug($city_name)]), $city_name) !!}

    @if(!empty($category_name))
        {!! tools_breadcrumbs(route('site.sitemap.seo.category.companies', [ str_slug($state_abbr), $city_id, str_slug($city_name), $category_id, str_slug($category_name) ] ), $category_name) !!}
    @endif

    {!! tools_breadcrumbs(null, $company->name_fantasy) !!}

@endsection
