@extends('admin::app')

@section('breadcrumb')

   <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('admin.index') }}">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Visualizando Estados</span>
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
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject"> Listando Estados</span>
                    </div>
                
                </div>
                <div class="portlet-body">

                    <div id="loading">Carregando...</div>

                    <table class="table table-striped table-bordered table-hover table-checkable order-column hide" id="sample_1">
                        <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th> Nome Estado </th>
                                <th> Telefone </th>
                                <th> Ativo </th>
                                <th> Ações </th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($states as $state)

                            <tr class="odd gradeX {!! $state->active === '1' ? 'color_status' : '' !!}">
                                <td>
                                    <a href="{{ route('admin.cities.all', $state->id) }}">{{ $state->id }}</a>                                    
                                </td>
                                <td><a href="{{ route('admin.cities.all', $state->id) }}"> {{ $state->name }} </a></td>
                                <td>
                                    <a href="{{ route('admin.cities.all', $state->id) }}">{{ $state->abbr }}</a>
                                </td>
                
                                <td class="center">  
                                    <input type="checkbox" class="jq_status_state" {!! $state->active === '1' ? 'checked' : '' !!} value="{{ $state->active }}" data-id="{{ $state->id }}"  data-name="{{ $state->name }}" data-toggle="toggle" data-onstyle="success"> 
                                </td>
                          

                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Ação
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                   
                                            <li>
                                                <a href="{{ route('admin.cities.all', $state->id) }}">
                                                    <i class="fa fa-circle"></i> Ver Cidades </a>
                                            </li>

                                        </ul>
                                    </div>
                                </td>

                            </tr>

                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>


</div>
<!-- END PAGE CONTENT INNER -->

@endsection


@section('page-level-plugins-head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<link href="/assets/companies/admin/theme/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/companies/admin/theme/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
@endsection

@section('page-level-scripts-css')

@endsection

@section('page-level-plugins-body')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script src="/assets/companies/admin/theme/global/scripts/datatable.js" type="text/javascript"></script>
<script src="/assets/companies/admin/theme/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="/assets/companies/admin/theme/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="/assets/companies/admin/theme/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>


@endsection

@section('page-level-scripts-js')
<script src="{{ asset('/assets/companies/admin/js/app/services/HttpService.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/services/ListStateService.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/controllers/ListStateController.js') }}" type="text/javascript"></script>

<script>
(function() {
    'use strict';
    var controllerListState = new ListStateController();
    controllerListState.init();    
})();
</script>
@endsection
