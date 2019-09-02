@section('page-level-plugins-head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
@endsection

@section('page-level-scripts-css')

@endsection

@section('page-level-plugins-body')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

@endsection

@section('page-level-scripts-js')
<script src="{{ asset('/assets/companies/admin/js/app/services/HttpService.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/services/ListCompanyService.js') }}" type="text/javascript"></script>

<script src="{{ asset('/assets/companies/admin/js/app/views/ComboCategoryView.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/views/ComboPlanView.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/views/ComboStateView.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/views/ComboCityView.js') }}" type="text/javascript"></script>

<script src="{{ asset('/assets/companies/admin/js/app/controllers/ListCompanyController.js') }}" type="text/javascript"></script>
<script>
(function() {
    'use strict';   
    var controllerListCompany = new ListCompanyController();
    controllerListCompany.init();
})();
</script>
@endsection