
@section('page-level-plugins-head')
<meta content="{{ isset( $company ) ? $company->id : ''}}" name="company_id" />
<meta content="{{ isset( $company ) ? $company->plan_id : ''}}" name="plan_id" />

<meta content="{{ isset( $company ) ? $company->state_id : ''}}" name="state_id" />
<meta content="{{ isset( $company ) ? $company->city_id : ''}}" name="city_id" />
<meta content="{{ isset( $company->zipcode ) ? $company->zipcode->id : '' }}" name="zipcode_id" />
<meta content="{{ isset( $company ) ? $company->place_id : ''}}" name="place_id" />
<meta content="{{ isset( $company ) ? $company->district_id : ''}}" name="district_id" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">

<link href="{{ asset('/assets/companies/admin/theme/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/assets/companies/admin/theme/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('/assets/companies/admin/theme/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-level-scripts-css')
<link href="{{ asset('/assets/companies/admin/theme/global/plugins/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/assets/companies/admin/theme/global/plugins/bootstrap-sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css" />

<style>
    .result_api{
        font-family: Arial, Helvetica, sans-serif;
        font-size: 13px;
        color: #4b8df9;
        cursor:pointer;
    }
    .suggest {
        ont-family: Arial, Helvetica, sans-serif;
        font-size: 11px;
        color: red;
    }
</style>
@endsection

@section('page-level-plugins-body')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script src="{{ asset('/assets/companies/admin/theme/global/plugins/jquery-bootpag/jquery.bootpag.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/theme/global/plugins/holder.js') }}" type="text/javascript"></script>

<script src="{{ asset('/assets/companies/admin/theme/global/plugins/jquery.pulsate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/theme/pages/scripts/ui-general.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('/assets/companies/admin/theme/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/theme/global/plugins/typeahead/handlebars.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/theme/global/plugins/typeahead/typeahead.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/theme/pages/scripts/components-bootstrap-tagsinput.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('/assets/companies/admin/theme/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/theme/global/plugins/bootstrap-select/js/bootstrap-select.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/theme/pages/scripts/components-bootstrap-select.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('/assets/companies/admin/theme/global/plugins/bootstrap-sweetalert/sweetalert.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/theme/pages/scripts/ui-sweetalert.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('/js/plugins/jquery/jquery.maskedinput.js') }}" type="text/javascript"></script>

@endsection

@section('page-level-scripts-js')

<script src="{{ asset('/js/plugins/jquery/jquery.autocomplete.min.js') }}"></script>

<script src="{{ asset('/assets/companies/admin/js/app/services/HttpService.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/helpers/CharacterCountHelper.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/helpers/ValidateHelper.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/helpers/MaskHelper.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/helpers/ValidateCpfCnpjHelper.js') }}" type="text/javascript"></script>

<script src="{{ asset('/assets/companies/admin/js/app/services/BaseCompanyService.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/services/EditCompanyService.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/services/ListSubcategoryService.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/services/ClientService.js') }}" type="text/javascript"></script>

<script src="{{ asset('/assets/companies/admin/js/app/services/ClientCheckEmailService.js') }}" type="text/javascript"></script>

<script src="{{ asset('/assets/companies/admin/js/app/services/CompanyAddressService.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/services/CheckRegisteredPhone.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/services/PhoneService.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/services/GalleryService.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/services/CompanyPlaceService.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/services/CompanyDistrictService.js') }}" type="text/javascript"></script>

<script src="{{ asset('/assets/companies/admin/js/app/services/company/CompanyFormSearchService.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/services/company/CompanyRemoveService.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/services/company/CompanyUpdateStatusService.js') }}" type="text/javascript"></script>

<script src="{{ asset('/assets/companies/admin/js/app/views/BaseCompanyView.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/views/EditCompanyView.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/views/ComboCategoryView.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/views/ComboSubcategoryView.js') }}" type="text/javascript"></script>

<script src="{{ asset('/assets/companies/admin/js/app/views/ComboPlanView.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/views/ComboStateView.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/views/ComboCityView.js') }}" type="text/javascript"></script>

<script src="{{ asset('/assets/companies/admin/js/app/controllers/company/BaseCompanyController.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/controllers/company/EditCompanyController.js') }}" type="text/javascript"></script>

<script>

(function() {
   var controller = new EditCompanyController();
    controller.init();
})();

@if (session('success_register'))
(function() {
    'use strict';
    $(function () {
        toastr["success"]("Registros foram inseridos com sucesso!");
    });
})();
@endif
@if (session('success_edit'))
(function() {
    'use strict';
    $(function () {
        toastr["success"]("Dados alterados com sucesso!");
    });
})();
@endif
@if (session('error_edit'))
(function() {
    'use strict';
    $(function () {
        toastr["error"]("Houve um erro no processamento do pedido!");
    });
})();
@endif
@if (session('error_edit_duplicate'))
(function() {
    'use strict';
    $(function () {
        toastr["error"]('{{ session("error_edit_duplicate") }}');
    });
})();
@endif
</script>
@endsection
