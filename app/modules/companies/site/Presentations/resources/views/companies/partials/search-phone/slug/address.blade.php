<address class="text-left">

    @if(isset($company->place->name))
        {{ $company->place->name }},
    @endif

    @if(isset($company->numeral))
        {{ $company->numeral }},
    @endif

    @if(isset($district_name))
        {{ $district_name }}
    @endif

    @if(isset($company->complement))
        - "{{ $company->complement }}"
    @endif

    <br>
    
    @if(isset($company->zipcode->code))
        CEP {{ $company->zipcode->code }} -
    @endif

    @if(isset($city_name))
        {{ $city_name }}
    @endif

    @if(isset($state_abbr ))
        - {{ $state_abbr  }}
    @endif
</address>