<article class="featured">
    <div class="row free-search">

        @desktop

            <div class="{{ $company_sponsors === true ? 'col-xs-12 col-sm-9 col-md-9' : 'col-xs-8 col-sm-8 col-md-8' }}">
                @include('site::companies.partials.search-phone.slug.title')
                @include('site::companies.partials.search-phone.slug.categories')
                @include('site::companies.partials.search-phone.slug.address')
            </div>

            <div class="{{ $company_sponsors === true ? 'col-xs-12 col-sm-3 col-md-3' : 'col-xs-4 col-sm-4 col-md-4' }}">

                @php
                $collection = collect($company->phones);
                $sorted = $collection->sortBy('number');
                @endphp

                @foreach($sorted->values()->all() as $phone)
                    @include('site::companies.partials.search-phone.to-see-phone')
                @endforeach

                @include('site::companies.partials.search-phone.inc-btn-solicitation')

            </div>

        @elsedesktop

            <div class="col-xs-12 col-sm-9 col-md-9">
                @include('site::companies.partials.search-phone.slug.title')
                @include('site::companies.partials.search-phone.slug.categories')
                @include('site::companies.partials.search-phone.slug.address')
            </div>

            <div class="col-xs-12 col-sm-3 col-md-3">

                @php
                $collection = collect($company->phones);
                $sorted = $collection->sortBy('number');
                @endphp

                @foreach($sorted->values()->all() as $phone)
                    @include('site::companies.partials.search-phone.to-see-phone')
                @endforeach

                <!-- @include('site::companies.partials.search-phone.inc-btn-solicitation')  -->

            </div>

        @enddesktop

    </div>
</article>
