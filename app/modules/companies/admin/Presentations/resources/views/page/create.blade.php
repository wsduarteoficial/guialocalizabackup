@extends('admin::app')

@section('breadcrumb')

    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('admin.index') }}">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Criando página</span>
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
            <!-- BEGIN EXTRAS PORTLET-->
            <div class="portlet light form-fit ">
                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-layers font-green"></i>
                        <span class="caption-subject font-green bold">Criar Página</span>
                    </div>
                </div>
                <div class="portlet-body form">

                    <form action="{{ route('admin.pages.create.post') }}" class="form-horizontal form-bordered" method="post">

                        @include('admin::page.includes.form')

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-10">
                                    <button type="submit" class="btn green">
                                        <i class="fa fa-check"></i> Salvar novo</button>
                                    <button type="button" onclick="location.href='{{ route("admin.pages.all") }}'" class="btn grey-salsa btn-outline">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
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

<link href="/assets/companies/admin/theme/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
@endsection

@section('page-level-plugins-body')

<script src="/assets/companies/admin/theme/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
<script src="/assets/companies/admin/theme/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
<script src="/assets/companies/admin/theme/pages/scripts/components-editors.min.js" type="text/javascript"></script>

@endsection

@section('page-level-scripts-js')

@endsection
