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
