@extends('admin::app')

@section('breadcrumb')
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="{{ route('admin.index') }}">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>Cadastro de Mídias Sociais</span>
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
            <div id="alert_container"> </div>
        </div>

        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> Cadastrando Mídias Sociais</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form role="form" action="{{ route('admin.settings.socials.post') }}" method="post">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-body">

                            <div class="form-group">
                                <label>Facebook</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-facebook-official"></i>
                                    </span>
                                    <input type="url" name="facebook" value="{{ isset($settings->facebook) ? $settings->facebook : ''}}" class="form-control" placeholder="Informe a URL completa do Facebook"> </div>
                            </div>

                            <div class="form-group">
                                <label>Twitter</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-twitter"></i>
                                    </span>
                                    <input type="url" name="twitter" value="{{ isset($settings->twitter) ? $settings->twitter : ''}}" class="form-control" placeholder="Informe a URL completa do Twitter"> </div>
                            </div>

                            <div class="form-group">
                                <label>Google Plus</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-google-plus"></i>
                                    </span>
                                    <input type="url" name="google" value="{{ isset($settings->google) ? $settings->google : ''}}" class="form-control" placeholder="Informe a URL completa do Google Plus"> </div>
                            </div>

                            <div class="form-group">
                                <label>Instagram</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-instagram"></i>
                                    </span>
                                    <input type="url" name="instagram" value="{{ isset($settings->instagram) ? $settings->instagram : ''}}" class="form-control" placeholder="Informe a URL completa do Instagram"> </div>
                            </div>


                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn blue">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END SAMPLE FORM PORTLET-->

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


@if (Session::has('success_register'))

    <script type="text/javascript">

        App.alert({
            container: $('#alert_container').val(),
            place: 'append',
            type: 'success',
            message: 'Dados foram alterados com sucesso!',
            close: true,
            reset: false,
            focus: true,
            closeInSeconds: 10000,
            icon: 'fa fa-check'
        });

    </script>

@endif

@endsection
