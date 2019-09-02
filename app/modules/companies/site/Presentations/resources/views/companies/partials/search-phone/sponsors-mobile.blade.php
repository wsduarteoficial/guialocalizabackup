<div class="col-xs-12 col-sm-12 col-md-12">

    @include('site::companies.partials.search-phone.slug.title')
    @include('site::companies.partials.search-phone.slug.categories')

    @php
    $collection = collect($company->phones);
    $sorted = $collection->sortBy('number');
    @endphp

    @foreach($sorted->values()->all() as $phone)
        @include('site::companies.partials.search-phone.to-see-phone')
    @endforeach

    <div class="row text-left media">
        <div class="col-sm-12 text-text-left text-center-xs">
            @include('site::companies.partials.search-phone.slug.address')
            @if($company->plan_id > 1)
                @include('site::companies.partials.search-phone.social-media')
            @endif
        </div>
    </div>

    <!-- <div class="row text-left mobile-btn-solicitation">
        <div class="col-sm-12 text-text-center text-center-xs">
            <a class="btn btn--default btn--xs btn_alteration" href="#">
                <span class="btn__text"><i class="material-icons">mode_edit</i> Solicitar alteração</span>
            </a>
        </div>
    </div> -->

</div>
