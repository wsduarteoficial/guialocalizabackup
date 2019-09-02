<div class="text-left categories">
    Em
    @if(isset( $company->categories ))
        @foreach($company->categories as $category)
            @if (isset($category->id))
                @php
                    array_push($array_category_id, $category->id)
                @endphp

                <a rel="nofollow" href="{{ tools_slug_category_companies($state_abbr, $city_name, $city_id, $category->name, $category->id) }}" 
                title="{{ $category->name }}" class="category">{{ $category->name }}</a>                                

            @endif
        @endforeach
    @endif
</div>