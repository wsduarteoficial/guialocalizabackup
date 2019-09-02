@extends('admin::app')

@section('breadcrumb')

<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="index.html">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>Dashboard</span>
    </li>
</ul>

@endsection


@section('main-content')

<div class="page-content-inner">
    <div class="mt-content-body">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <a href="{{ route('admin.companies.active') }}" title="Empresas ativas">
                    <div class="dashboard-stat2 ">
                        <div class="display">
                            <div class="number">
                                <h3 class="font-green-sharp">
                                    <span data-counter="counterup" data-value="{{ $display_company['company_total_active'] }}">0</span>
                                </h3>
                                <small>Empresas ativas</small>
                            </div>
                            <div class="icon">
                                <i class="fa fa-building"></i>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="progress">
                                <span style="width: {{ $display_company['company_percentage_active'] }}%;" class="progress-bar progress-bar-success green-sharp">
                                <span class="sr-only">{{ $display_company['company_percentage_active'] }}% ativados</span>
                                </span>
                            </div>
                            <div class="status">
                                <div class="status-title"> ativados </div>
                                <div class="status-number"> {{ $display_company['company_percentage_active'] }}% </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <a href="{{ route('admin.companies.inactive') }}" title="Empresas inativas">
                    <div class="dashboard-stat2 ">
                        <div class="display">
                            <div class="number">
                                <h3 class="font-red-haze">
                                    <span data-counter="counterup" data-value="{{ $display_company['company_total_inactive'] }}">0</span>
                                </h3>
                                <small>Empresas inativas</small>
                            </div>
                            <div class="icon">
                                <i class="fa fa-sort-amount-desc"></i>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="progress">
                                <span style="width: {{ $display_company['company_percentage_inactive'] }}%;" class="progress-bar progress-bar-success red-haze">
                                <span class="sr-only">{{ $display_company['company_percentage_inactive'] }}% inativos</span>
                                </span>
                            </div>
                            <div class="status">
                                <div class="status-title"> inativos </div>
                                <div class="status-number"> {{ $display_company['company_percentage_inactive'] }}% </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!--
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 ">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-blue-sharp">
                                <span data-counter="counterup" data-value="567"></span>
                            </h3>
                            <small>Clientes ativos</small>
                        </div>
                        <div class="icon">
                            <i class="fa fa-rocket"></i>
                        </div>
                    </div>
                    <div class="progress-info">
                        <div class="progress">
                            <span style="width: 45%;" class="progress-bar progress-bar-success blue-sharp">
                            <span class="sr-only">45% grow</span>
                            </span>
                        </div>
                        <div class="status">
                            <div class="status-title"> grow </div>
                            <div class="status-number"> 50% </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 ">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-purple-soft">
                                <span data-counter="counterup" data-value="{{ $display_client['plans']  }}"></span>
                            </h3>
                            <small>Clientes vincendo</small>
                        </div>
                        <div class="icon">
                            <i class="fa fa-flag"></i>
                        </div>
                    </div>
                    <div class="progress-info">
                        <div class="progress">
                            <span style="width: 57%;" class="progress-bar progress-bar-success purple-soft">
                            <span class="sr-only">{{ $display_client['plans'] }}% change</span>
                            </span>
                        </div>
                        <div class="status">
                            <div class="status-title"> change </div>
                            <div class="status-number"> {{ $display_client['plans'] }}% </div>
                        </div>
                    </div>
                </div>
            </div>
            -->
        </div>
        <!--
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 ">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-green-sharp">
                                <span data-counter="counterup" data-value="7800">0</span>
                            </h3>
                            <small>Telefones ativos</small>
                        </div>
                        <div class="icon">
                            <i class="fa fa-toggle-on"></i>
                        </div>
                    </div>
                    <div class="progress-info">
                        <div class="progress">
                            <span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
                            <span class="sr-only">76% progress</span>
                            </span>
                        </div>
                        <div class="status">
                            <div class="status-title"> progress </div>
                            <div class="status-number"> 76% </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 ">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-red-haze">
                                <span data-counter="counterup" data-value="1349">0</span>
                            </h3>
                            <small>Telefones inativos</small>
                        </div>
                        <div class="icon">
                            <i class="fa fa-toggle-off"></i>
                        </div>
                    </div>
                    <div class="progress-info">
                        <div class="progress">
                            <span style="width: 85%;" class="progress-bar progress-bar-success red-haze">
                            <span class="sr-only">85% change</span>
                            </span>
                        </div>
                        <div class="status">
                            <div class="status-title"> change </div>
                            <div class="status-number"> 85% </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 ">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-blue-sharp">
                                <span data-counter="counterup" data-value="567"></span>
                            </h3>
                            <small>Lixeira</small>
                        </div>
                        <div class="icon">
                            <i class="fa fa-trash"></i>
                        </div>
                    </div>
                    <div class="progress-info">
                        <div class="progress">
                            <span style="width: 45%;" class="progress-bar progress-bar-success blue-sharp">
                            <span class="sr-only">45% grow</span>
                            </span>
                        </div>
                        <div class="status">
                            <div class="status-title"> grow </div>
                            <div class="status-number"> 45% </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 ">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-purple-soft">
                                <span data-counter="counterup" data-value="276"></span>
                            </h3>
                            <small>Oi Empresas</small>
                        </div>
                        <div class="icon">
                            <i class="fa fa-filter"></i>
                        </div>
                    </div>
                    <div class="progress-info">
                        <div class="progress">
                            <span style="width: 57%;" class="progress-bar progress-bar-success purple-soft">
                            <span class="sr-only">56% change</span>
                            </span>
                        </div>
                        <div class="status">
                            <div class="status-title"> change </div>
                            <div class="status-number"> 57% </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        -->
    </div>
</div>
@endsection

@section('page-level-plugins-head')
<link href="/assets/companies/admin/theme/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/companies/admin/theme/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
<link href="/assets/companies/admin/theme/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/companies/admin/theme/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
@endsection

@section('page-level-scripts-css')

@endsection

@section('page-level-plugins-body')
<script src="/assets/companies/admin/theme/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="/assets/companies/admin/theme/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="/assets/companies/admin/theme/global/plugins/morris/morris.min.js" type="text/javascript"></script>
<script src="/assets/companies/admin/theme/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
<script src="/assets/companies/admin/theme/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="/assets/companies/admin/theme/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
<script src="/assets/companies/admin/theme/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="/assets/companies/admin/theme/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="/assets/companies/admin/theme/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="/assets/companies/admin/theme/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="/assets/companies/admin/theme/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="/assets/companies/admin/theme/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="/assets/companies/admin/theme/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="/assets/companies/admin/theme/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="/assets/companies/admin/theme/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="/assets/companies/admin/theme/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="/assets/companies/admin/theme/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="/assets/companies/admin/theme/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="/assets/companies/admin/theme/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>


<script src="//www.google.com/jsapi" type="text/javascript"></script>
<script src="/assets/companies/admin/theme/pages/scripts/charts-google.min.js" type="text/javascript"></script>
@endsection

@section('page-level-scripts-js')

@endsection


