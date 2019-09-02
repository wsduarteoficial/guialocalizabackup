<a rel="nofollow" class="btn btn--default btn--xs" href="{{ route('site.solicitation.change', [$company->company_uuid, base64_encode( asset( tools_slug_title_companies($state_abbr, $city_id, $city_name, $district_name, $company->name_fantasy, $company->id) ) )] ) }}">
    <span class="btn__text"><i class="material-icons">mode_edit</i> Solicitar alteração</span>
</a>
