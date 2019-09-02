@extends('admin::app')

@section('breadcrumb')
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="{{ route('admin.index') }}">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>Alterar logos</span>
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
            <!-- BEGIN PORTLET-->
            <div class="portlet light form-fit ">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-green"></i>
                        <span class="caption-subject font-green sbold uppercase">Alterar logos</span>
                    </div>

                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.settings.logos.post') }}" class="form-horizontal form-bordered" enctype="multipart/form-data" method="post">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-body">

                            <div class="form-group ">
                                <label class="control-label col-md-3">Logo do Site</label>
                                <div class="col-md-9">

                                    <div class="clearfix margin-top-10">
                                        <span class="label label-info">Atenção!</span>
                                        A logo será mostrada no topo e base do site, em todas as páginas. <br><br>
                                        <strong>Para que a logo fique visível em dispositivos Mobiles e Desktops, recomendamos o tamanho de 180x40, e com extensão PNG</strong>

                                    </div>

                                    <div class="fileinput fileinput-new margin-top-10" data-provides="fileinput">

                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 50px;">
                                            <img src="{{ asset('/storage/uploads/logos-app/logo.png') }}" alt="" />
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 50px;"></div>

                                        <div>
                                            <span class="btn red btn-outline btn-file">
                                                <span class="fileinput-new"> Selecione a imagem </span>
                                                <span class="fileinput-exists"> Alterar </span>
                                                <input type="file" name="logo"> </span>
                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remover </a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="control-label col-md-3">Compartilhar Logo</label>
                                <div class="col-md-9">

                                    <div class="clearfix margin-top-10">
                                        <span class="label label-info">Atenção!</span>
                                        <strong>Para que a logo fique visível no facebook, ele deve ter o tamanho mínimo de 200x200, e com extensão PNG</strong>

                                    </div>

                                    <div class="fileinput fileinput-new margin-top-10" data-provides="fileinput">

                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                            <img src="{{ asset('/storage/uploads/logos-app/logo-shared.png') }}" alt="" />
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"></div>

                                        <div>
                                            <span class="btn red btn-outline btn-file">
                                                <span class="fileinput-new"> Selecione a imagem </span>
                                                <span class="fileinput-exists"> Alterar </span>
                                                <input type="file" name="logo_shared"> </span>
                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remover </a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">

                                    <input type="submit" class="btn green" value="Enviar">
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END PORTLET-->
        </div>
    </div>
</div>
<!-- END PAGE CONTENT INNER -->

@endsection

@section('page-level-plugins-head')
<link href="/assets/companies/admin/theme/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
@endsection

@section('page-level-scripts-css')

@endsection

@section('page-level-plugins-body')
<script src="/assets/companies/admin/theme/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
@endsection

@section('page-level-scripts-js')


@if (Session::has('success_register'))



@endif


@if (session('status'))

     <script type="text/javascript">

        App.alert({
            container: $('#alert_container').val(),
            place: 'append',
            type: 'success',
            message: '{{ session('status') }}',
            close: true,
            reset: false,
            focus: true,
            closeInSeconds: 10000,
            icon: 'fa fa-check'
        });

    </script>

@endif

@endsection
