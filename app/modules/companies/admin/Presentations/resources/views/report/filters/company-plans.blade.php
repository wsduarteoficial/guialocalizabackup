@extends('admin::app')

@section('breadcrumb')

<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="{{ route('admin.index') }}">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>Relatório de Planos</span>
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
                <div class="panel-heading"> Relatório de Planos </div>
                <div class="panel-body">

                  <div class="portlet-body form">
                      <form class="form-horizontal" role="form" action="{{ route('admin.reports.company.plans.view') }}" target="_blank">
                          <div class="form-body">

                              <div class="form-group">
                                  <label class="col-md-2 control-label">Plano</label>
                                  <div class="col-md-9">
                                      <select name="plan" class="form-control jq_combo_plan" required>
                                          <option>Selecione o Plano</option>
                                      </select>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label class="col-md-2 control-label">Estado</label>
                                  <div class="col-md-9">
                                      <select name="state" class="form-control jq_combo_state" required disabled></select>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label class="col-md-2 control-label">Cidade</label>
                                  <div class="col-md-9">
                                    <select name="city" class="form-control jq_combo_city" disabled>
                                        <option value="">Selecione a Cidade</option>
                                    </select>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label class="col-md-2 control-label"></label>
                                  <div class="col-md-10">
                                    <div class="form-action">
                                        <button type="submit" class="btn green" disabled>Gerar Relatório</button>
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
    var report_filter = new ReportFilterController();
    report_filter.init();
})();
</script>
@endsection
