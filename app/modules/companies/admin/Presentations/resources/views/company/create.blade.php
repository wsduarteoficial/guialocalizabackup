@extends('admin::app')

@section('main-content')
<div class="page-content-inner">

    <form name="create-new-company" action="{{ route('admin.companies.create.post') }}" enctype="multipart/form-data" method="post">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="row">

            <div class="col-md-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlets">
                    <div class="portlet-title">

                        <div class="caption">
                             <h4 class="block"><i class="fa fa-building"></i> Cadastrando Empresas  </h4>
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

                            @include('admin::company.components.panel-data-seo')

                        </div>
                   </div>

                </div>
                <!-- END SAMPLE TABLE PORTLET-->
            </div>
        </div>

        <div class="row show-buttons-free">
            <div class="col-md-12">
                <button type="submit" id="save_continue" class="btn purple btn-lg btn-block">Continuar Cadastro</button>
            </div>
        </div>

        <div class="row show-buttons-sponsors">

            <div class="col-md-6">
                <button type="submit" id="only_save" class="btn green btn-lg btn-block">Salvar Cadastro</button>
            </div>
            <div class="col-md-6">
                <button type="submit" id="save_add_new" class="btn blue btn-lg btn-block">Salvar e Adicionar Novo</button>
            </div>
        </div>

        <input type="hidden" name="type_redirect">
        <input type="hidden" name="company_uuid" value="{{ Uuid::generate() }}">

    </form>

</div>

@include('admin::company.components.modal-panel-data-address')

@endsection

@include('admin::company.scripts-create')
