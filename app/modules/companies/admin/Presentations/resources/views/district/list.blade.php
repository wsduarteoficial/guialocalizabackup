@extends('admin::app')

@section('breadcrumb')
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="{{ route('admin.index') }}">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>Visualizando Bairros</span>
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
                        <span class="caption-subject"> Listando bairros em <span class="bold uppercase">{{ $city->name ."-". $city->state->abbr }}</span></span>
                    </div>

                    <div class="btn-group pull-right">
                         <a href="#" class="btn sbold green" data-target=".modal-register" data-toggle="modal"> Cadastrar Novo
                            <i class="fa fa-plus"></i>
                        </a>
                        
                    </div>  


                </div>
                <div class="portlet-body" >
                    
                    <div id="loading">Carregando...</div>

                    <table class="table table-striped table-bordered table-hover table-checkable order-column hide" id="sample_1">
                        <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th> Bairro </th>
                                <th> Cidade </th>
                                <th> Ativo </th>
                                <th> Ações </th>
                            </tr>
                        </thead>
                        <tbody class="appendedContainer">
                            
                            @foreach($districts as $district)

                            <tr class="odd gradeX {!! $district->active === '1' ? 'color_status' : '' !!}">
                                <td>
                                    {{ $district->id }}
                                </td>
                                <td><span class="jq_district_name_{{ $district->id }}">{{ $district->name }}</span></td>
                                <td>
                                    {{ $city->name ."-". $city->state->abbr }}
                                </td>
                
                                <td class="center">  
                                    <input type="checkbox" class="jq_status_district" {!! $district->active === '1' ? 'checked' : '' !!} value="{{ $district->active }}" data-id="{{ $district->id }}"  data-name="{{ $district->name }}" data-toggle="toggle" data-onstyle="success"> 
                                </td>
                              
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Ação
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            
                                            <li>                   
                                                <a href="#" data-id="{{ $district->id }}" data-name="{{ $district->name }}" onclick="ListDistrictController.setDataModalEdit(this.getAttribute('data-id'), this.getAttribute('data-name') );"  data-target=".modal-edit" data-toggle="modal">
                                                    <i class="fa fa-edit"></i> Editar 
                                                </a>
                                            </li>       

                                            <li>
                                                <a href="#" class="jq_remove_district"  data-id="{{ $district->id }}" data-name="{{ $district->name }}" >
                                                    <i class="fa fa-times"></i> Remover </a>
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


<!-- /.modal -->
<div class="modal fade modal-register" tabindex="-1" data-width="400">

    <div class="modal-dialog">
        <div class="modal-content">

            <form id="register" action="">                

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title bold">Cadastrar Bairro</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">                    
                            <input type="text" class="col-md-12 form-control" districtholder="Nome da Bairro" name="name" required="required" oninvalid="this.setCustomValidity('Informe o nome do Bairro.')"> 
                            <br>
                            <br>
                            <h4>Cidade: <span class="bold"> {{ $city->name ."-". $city->state->abbr }} </span> </h4>
                            <input type="hidden" name="city_id" value="{{ $city->id }}">                      
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Fechar</button>
                    <button type="submit" class="btn green">Cadastrar</button>
                </div>

            </form>

        </div>
    </div>
</div>


<!-- /.modal -->
<div class="modal fade modal-edit" tabindex="-1" data-width="400">

    <div class="modal-dialog">
        <div class="modal-content">

            <form id="edit" action="">                

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title bold">Editar Bairro</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">                    
                            <input required="required" oninvalid="this.setCustomValidity('Informe o nome do Bairro..')" type="text" class="col-md-12 form-control" districtholder="Nome da Bairro" id="edit-district-name" name="name"> 
                            <br>
                            <br>
                            <h4>Cidade: <span class="bold"> {{ $city->name ."-". $city->state->abbr }} </span> </h4>
                            <input type="hidden" id="edit-city-id" name="city_id" value="{{ $city->id }}">                      
                            <input type="hidden" id="edit-district-id" name="district_id">                      
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Fechar</button>
                    <button type="submit" class="btn green">Salvar Alterações</button>
                </div>

            </form>

        </div>
    </div>
</div>
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
<script src="{{ asset('/assets/companies/admin/js/app/services/ListDistrictService.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/controllers/ListDistrictController.js') }}" type="text/javascript"></script>

<script>
(function() {
    'use strict';   
    var controllerListDistrict = new ListDistrictController();
    controllerListDistrict.init();
})();
</script>
@endsection
