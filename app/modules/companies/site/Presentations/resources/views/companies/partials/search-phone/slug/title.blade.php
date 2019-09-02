<div class="text-left title">
    <a href="{{ asset( tools_slug_title_companies($state_abbr, $city_id, $city_name, $district_name, $company->name_fantasy, $company->id) ) }}" title="{{ $company->name_fantasy }}">
        {{ $company->name_fantasy }}  
    </a>
    @if (Auth::check())
        <a rel="nofollow" href="{{ route('admin.companies.edit', $company->id) }}" target="_blank" title="Editar cadastro" class="type--fine-print color--primary-2">
            <i class="material-icons">
                    mode_edit
            </i>  
        </a>
    @endif    
</div>
