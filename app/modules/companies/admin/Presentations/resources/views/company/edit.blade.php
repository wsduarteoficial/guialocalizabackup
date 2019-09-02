@extends('admin::app')

@section('main-content')
<div class="page-content-inner">

    <form name="edit-company" action="{{ route('admin.companies.edit.post', $company->id ) }}" enctype="multipart/form-data" method="post">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="row">

            <div class="col-md-12">

                <div class="pull-right">
                    <button type="submit" class="btn green-meadow">Salvar Cadastro</button>

                    <a class="btn red jq_remove_company" data-id="{{ $company->id }}" data-name="{{ $company->name_fantasy }}" data-url-redirect="{{ route('admin.companies.active') }}">
                        Enviar para Lixeira <i class="fa fa-trash"></i>
                    </a>

                    <input type="checkbox" class="jq_change_status_company" data-url-redirect="{{ route('admin.companies.active') }}" {!! $company->active == '1' ? 'checked' : '' !!} value="{{ $company->active }}" data-id="{{ $company->id }}" data-name="{{ $company->name_fantasy }}" data-toggle="toggle" data-onstyle="success">

                     <a href="{{ route('admin.companies.active') }}" class="btn default">
                        Lista de Empresas Ativas <i class="fa fa-history"></i>
                    </a>
                </div>

                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlets">
                    <div class="portlet-title">

                        <div class="caption">

                            <h4 class="block"><i class="fa fa-building"></i> Editando Empresa : <strong> {{ $company->name_fantasy }} </strong> <a href="{{ route('companies.seo.page.view.admin', $company->id) }}" target="_blank" title="Visualizar Página de Resultado"><i class="fa fa-external-link"></i></a></h4>



                        </div>




                        <a href="#click_alert_info" id="jq_click_alert_info" class="scroll"></a>
                        <div id="click_alert_info"></div>

                        @include('admin::company.components.panel-data-select-plan')

                        @include('admin::company.components.panel-data-info')

                        <div id="show-panels">

                            @include('admin::company.components.panel-data-contracts')

                            @include('admin::company.components.panel-data-company')

                            @include('admin::company.components.panel-data-categories')

                            @include('admin::company.components.panel-data-phones')

                            @include('admin::company.components.panel-data-address')

                            @include('admin::company.components.panel-data-address-web')

                            @include('admin::company.components.panel-data-galery')

                            @include('admin::company.components.panel-data-seo')

                        </div>
                   </div>

                </div>
                <!-- END SAMPLE TABLE PORTLET-->
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <button type="submit" id="update_register" class="btn green-meadow btn-lg btn-block">Atualizar Cadastro</button>
            </div>
        </div>

        <input type="hidden" name="type_redirect">
        <input type="hidden" name="company_uuid" value="{{ Uuid::generate() }}">
        <input type="hidden" name="company_id" value="{{ $company->id }}">

    </form>

</div>

@include('admin::company.components.modal-panel-data-address')

@endsection

@include('admin::company.scripts-edit')
