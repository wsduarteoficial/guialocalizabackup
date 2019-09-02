<div class="col-xs-12 col-sm-3 col-md-3">
	<div class="text-center">
		<a rel="nofollow" href="{{ asset( tools_slug_title_companies($state_abbr, $city_id, $city_name, $district_name, $company->name_fantasy, $company->id) ) }}">
            @php
            $path =  $company->bannerTop($company->id);
            @endphp

            @if(isset($path) && $path !== false)
                <img src="{{ asset( sprintf('/storage/uploads/companies/%d/banners/top-left/%s', $company->id,  $path)) }}" class="img-responsive">
            @else
                <img src="{{ asset( '/img/no-photo.png') }}" class="img-responsive">
            @endif
		</a>
	</div>
</div>

<div class="col-xs-12 col-sm-9 col-md-9">

    @include('site::companies.partials.search-phone.slug.title')
    @include('site::companies.partials.search-phone.slug.categories')

    @php
    $collection = collect($company->phones);
    $sorted = $collection->sortBy('number');
    @endphp

    @foreach($sorted->values()->all() as $phone)
        @include('site::companies.partials.search-phone.to-see-phone')
    @endforeach

    @include('site::companies.partials.search-phone.slug.address')

    <div class="row text-left media">
        <div class="col-sm-9 text-center-xs">
            @if($company->plan_id > 1)
                @include('site::companies.partials.search-phone.social-media')
            @endif
        </div>
        <div class="col-sm-2 btn_alteration">
            @include('site::companies.partials.search-phone.btn-solicitation')
        </div>
    </div>
</div>
