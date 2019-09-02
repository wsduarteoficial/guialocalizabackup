@extends('admin::app')

@section('breadcrumb')

<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="{{ route('admin.index') }}">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>Criar Novo Usuário</span>
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
        <div class="panel-heading"> Cadastrar Novo Usuário </div>
        <div class="panel-body">

          <div class="portlet-body form">
            <form class="form-horizontal" method="post" role="form" action="{{ route('admin.users.create.post') }}">              
                <div class="form-body">

                {{ csrf_field() }}

                <div class="form-group">
                  <label class="col-md-2 control-label">Nome</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="name" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">E-mail</label>
                  <div class="col-md-9">
                    <input type="email" class="form-control" name="email" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">Senha</label>
                  <div class="col-md-9">
                    <input type="password" class="form-control" name="password" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">Nível de Permissão</label>
                  <div class="col-md-9">
                    <select name="admin" class="form-control" required="required">
                        <option value="">Selecione o nível de permissão</option>
                        <option value="0">Editor</option>
                        <option value="1">Administrador</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label"></label>
                  <div class="col-md-10">
                    <div class="form-action">
                      <button type="submit" class="btn green">Cadastrar Novo</button>
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
<script src="{{ asset('/assets/companies/admin/js/app/controllers/UserController.js') }}" type="text/javascript"></script>

<script type="text/javascript">
(function() {
  'use strict';
  var controllerUser = new UserController();
  controllerUser.init();

  $(function() {

    $('input[name="name"]').val('');
    $('input[name="email"]').val('exemplo@guialocaliza.com.br');
    $('input[name="password"]').val('');

  });
})();
</script>
@endsection
