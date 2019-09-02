@extends('admin::app')

@section('breadcrumb')

    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('admin.index') }}">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Visualizando Páginas</span>
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
                        <span class="caption-subject"> Listando páginas</span>
                    </div>

                    <div class="btn-group pull-right">
                        <a href="{{ route('admin.pages.create') }}" class="btn sbold green"> Cadastrar Novo
                            <i class="fa fa-plus"></i>
                        </a>
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
                                <th> Nome </th>
                                <th> Ativo </th>
                                <th> Ações </th>
                            </tr>
                        </thead>
                        <tbody class="appendedContainer">

                            @foreach($pages as $key => $page)

                            <tr class="odd gradeX {!! $page->active === '1' ? 'color_status' : '' !!}">
                                <td>
                                    {{ $page->id }}
                                </td>

                                <td>
                                    <a href="{{ route('admin.pages.edit', $page->id) }}">
                                        <span class="jq_page_title_{{ $page->id }}">{{ $page->title }}</span>

                                    </a>
                                </td>

                                <td class="center">
                                    <input type="checkbox" class="jq_status_page" {!! $page->active === '1' ? 'checked' : '' !!} value="{{ $page->active }}" data-id="{{ $page->id }}"  data-name="{{ $page->title }}" data-toggle="toggle" data-onstyle="success">
                                </td>

                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Ação
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">

                                            <li>
                                                <a href="{{ route('admin.pages.edit', $page->id) }}" id="jq_edit_{{ $key }}" data-id="{{ $page->id }}" data-name="{{ $page->title }}" onclick="ListPageController.setDataModalEdit(this.getAttribute('data-id'), this.getAttribute('data-name') );"  data-target=".modal-edit" data-toggle="modal">
                                                    <i class="fa fa-edit"></i> Editar
                                                </a>
                                            </li>

                                            @if($page->default != 1)
                                            <li>
                                                <a href="javascript:" class="jq_remove_page"  data-id="{{ $page->id }}" data-name="{{ $page->title }}" >
                                                    <i class="fa fa-times"></i> Remover </a>
                                            </li>
                                            @endif

                                            <li>
                                                <a href="{{ route('pages.view', $page->slug) }}" target="_blank">
                                                    <i class="fa fa-edit"></i> Visualizar página
                                                </a>
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
<script src="{{ asset('/assets/companies/admin/js/app/services/ListPageService.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/controllers/ListPageController.js') }}" type="text/javascript"></script>

<script>
(function() {
    'use strict';
    var controllerListPage = new ListPageController();
    controllerListPage.init();
})();
</script>


@if (session('success'))
<script>
    (function() {
        'use strict';
        $(function () {
            toastr["success"]("{{ session('success') }}");
        });
    })();
</script>
@endif

@if (session('error'))
<script>
    (function() {
        'use strict';
        $(function () {
            toastr["error"]("{{ session('error') }}");
        });
    })();
</script>
@endif

@endsection


