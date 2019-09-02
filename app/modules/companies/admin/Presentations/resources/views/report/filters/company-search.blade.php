@extends('admin::app')

@section('breadcrumb')

<ul class="page-breadcrumb breadcrumb">
  <li>
    <a href="{{ route('admin.index') }}">Home</a>
    <i class="fa fa-circle"></i>
  </li>
  <li>
    <span>Relatório de Buscas no Site</span>
  </li>
</ul>

@endsection

@section('page-toolbar')

@endsection

@section('main-content')

<!-- BEGIN PAGE CONTENT INNER -->
<div class="page-content-inner">

  <div class="row">
    <div class="col-md-12">
      <!-- BEGIN EXAMPLE TABLE PORTLET-->

      <div class="panel panel-default">
        <div class="panel-heading"> Relatório de Buscas no Site </div>
        <div class="panel-body">

          <div class="portlet-body form">
            <form class="form-horizontal" role="form" action="{{ route('admin.reports.company.search.view') }}" target="_blank">
              <div class="form-body">

                <div class="form-group">
                  <div class="col-md-2 control-label">Período</div>
                  <div class="col-md-3">

                        <label for="">Data inícial</label>
                        <input type="date" name="date_start" class="form-control" required>

                    </div>
                    <div class="col-md-3">
                        <label for="">Data Final</label>
                        <input type="date" name="date_end" class="form-control" required>
                    </div>

                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">Estado</label>
                  <div class="col-md-9">
                    <select name="state" class="form-control jq_combo_state"></select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">Cidade</label>
                  <div class="col-md-9">
                    <select name="city" class="form-control jq_combo_city">
                      <option value="">Selecione a Cidade</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label"></label>
                  <div class="col-md-10">
                    <div class="form-action">
                      <button type="submit" class="btn green">Gerar Relatório</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>

      <!-- END EXAMPLE TABLE PORTLET-->
    </div>
  </div>


</div>
<!-- END PAGE CONTENT INNER -->

@endsection


@section('page-level-plugins-head')

@endsection

@section('page-level-scripts-css')

@endsection

@section('page-level-plugins-body')

@endsection

@section('page-level-scripts-js')
<script src="{{ asset('/assets/companies/admin/js/app/services/HttpService.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/services/ListCompanyService.js') }}" type="text/javascript"></script>

<script src="{{ asset('/assets/companies/admin/js/app/views/ComboCategoryView.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/views/ComboPlanView.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/views/ComboStateView.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/views/ComboCityView.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/controllers/ReportFilterController.js') }}" type="text/javascript"></script>

<script type="text/javascript">
(function() {
  'use strict';   
  var controllerReportFilter = new ReportFilterController();
  controllerReportFilter.init();
})();
</script>
@endsection
