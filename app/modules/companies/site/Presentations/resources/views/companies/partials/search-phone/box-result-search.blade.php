@php
$array_company = [];
$array_category_id = [];
$array_subcategory_id = [];
@endphp

<div class="col-xs-12 col-sm-12 col-md-{{ $company_sponsors === true ? 12 : 9 }}">

    @foreach($companies as $key => $company)
        @php
            $zip_code = '';
            if(isset($company->zipcode->code)):
                $zip_code = $company->zipcode->code;
            endif;
            
            $place_name = '';
            if(isset($company->place->name)):
                $place_name = $company->place->name;
            endif;

            $state_abbr = '';
            if(isset($company->state->abbr)):
                $state_abbr = $company->state->abbr;
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

            //ids categories
            if(isset( $company->categories )) :
                foreach($company->categories as $category) :
                    if(!in_array($category->id, $array_category_id)) :
                        array_push($array_category_id, $category->id);
                    endif;
                endforeach;
            endif;

            //ids subcategories
            if(isset( $company->subcategories )) :
                foreach($company->subcategories as $subcategory) :
                    if(!in_array($subcategory->id, $array_subcategory_id)) :
                            array_push($array_subcategory_id, $subcategory->id);
                    endif;
                endforeach;
            endif;

        @endphp

        @if( $company->plan_id > 1)
            @include('site::companies.partials.search-phone.result-sponsors')
        @else
            @include('site::companies.partials.search-phone.result-free')
        @endif

    @endforeach
</div>

@section('scriptsearchcategories')

    @desktop
    <script>
        var PHONES_MOBILE = 'False';
    </script>
    @elsedesktop
    <script>
        var PHONES_MOBILE = 'True';
    </script>
    @enddesktop

    <script>
        var PHONES_COMPANIES_SPONSORS = '{{ $company_sponsors === true ? "True" : "False" }}';
        var PHONES_CATEGORIES_IDS = {{ json_encode($array_category_id) }};
        var PHONES_SUBCATEGORIES_IDS = {{ json_encode($array_subcategory_id) }};
        var PHONES_TAG_SEARCH = '{{ Request::get('q') ?: null }}';
        var PHONES_STATE_SEARCH = {{ Request::get('state') ?: 0 }};
        var PHONES_CITY_SEARCH = {{ Request::get('city') ?: 0 }};
        var PHONES_TOTAL = {{ $companies->total() }};
        var PHONES_TOTAL_LINE = {{ $companies->count() }};
    </script>

@endsection
