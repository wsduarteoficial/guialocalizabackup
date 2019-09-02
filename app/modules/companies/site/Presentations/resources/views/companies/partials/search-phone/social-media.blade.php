<ul class="social-list list-inline list--hover">
        
    @if(!empty($company->website))
    <li>
        <a rel="nofollow" href="{{ $company->website }}" target="_BLANK" title="Site">
            <i class="socicon material-icons icon">link</i>
        </a>
    </li>
    @endif
    <!-- <li>
        <a href="#">
            <i class="socicon socicon-google icon icon--xs"></i>
        </a>
    </li> -->
    <!-- <li>
        <a href="#">
            <i class="socicon socicon-twitter icon icon--xs"></i>
        </a>
    </li> -->

    @if(!empty($company->facebook))
    <li>
        <a rel="nofollow" href="{{ $company->facebook }}" target="_BLANK" title="Facebook">
            <i class="socicon socicon-facebook icon icon--xs"></i>
        </a>
    </li>
    @endif

    @if(!empty($company->email))
    <li>
        <a rel="nofollow" href="{{ tools_slug_title_companies($state_abbr, $city_id, $city_name, $district_name, $company->name_fantasy, $company->id) }}#contact" title="Contato por E-mail">
            <i class="socicon socicon-mail icon icon--xs"></i>
        </a>
    </li>
    @endif

    <li>
        <a href="{{ tools_slug_google_maps_companies($place_name, $company->numeral, $district_name, $city_name, $state_abbr, $zip_code) }}" target="_BLANK" title="Google Maps">
            <i class="socicon material-icons cor-icon">place</i>
        </a>
    </li>

    @if($company->gallery->count() > 0)
    <li>
        <a el="nofollow" href="{{ tools_slug_title_companies($state_abbr, $city_id, $city_name, $district_name, $company->name_fantasy, $company->id) }}#photos" title="Galeria de Fotos">
            <i class="socicon material-icons cor-icon">photo</i>
        </a>
    </li>
    @endif

</ul>
