@extends('admin::app')

@section('breadcrumb')

   <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('admin.index') }}">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Dashboard</span>
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
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-social-dribbble font-blue-sharp"></i>
                        <span class="caption-subject font-blue-sharp bold uppercase">LISTANDO CATEGORIAS</span>
                    </div>
                    <div class="actions">
                         <a href="#" class="btn sbold green" data-target=".modal-register-category" data-toggle="modal"> Cadastrar Novo
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
                <div class="portlet-body list-categories">

                    <div id="loading">Carregando...</div>

                    <div id="tree_1" class="tree-demo hide">                       

                        <ul>
                            @foreach($categories as $category)
                            <li> {{ $category->name }} 

                                @foreach($category->subcategories as $subcategory)
                                <ul>
                                    <li data-jstree='{ "selected" : false }'>
                                         {{ $subcategory->name }}

                                        <div class="btn-group">
                                            <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">

                                                <li>
                                                    <a href="#" data-id="{{ $subcategory->id }}" data-name="{{ $subcategory->name }}" data-category-id="{{ $category->id }}" data-category-name="{{ $category->name }}" onclick="ListCategoryController.setDataModalEditSubcategory(this.getAttribute('data-id'), this.getAttribute('data-name'), this.getAttribute('data-category-id'), this.getAttribute('data-category-name') );" data-target=".modal-edit-subcategory" data-toggle="modal"> Editar Subcategoria </a>
                                                </li>                                                

                                                <li>
                                                    <a href="#" class="jq_remove_subcategory" data-id="{{ $subcategory->id }}" data-name="{{ $subcategory->name }}"> Remover Subcategoria</a>
                                                </li>
                                             
                                            </ul>
                                            
                                        </div>

                                    </li>
                                </ul>
                                @endforeach
         
                                <div class="btn-group">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">

                                        <li>
                                            <a href="#" data-id="{{ $category->id }}" data-name="{{ $category->name }}" onclick="ListCategoryController.setDataModalRegisterSubcategory(this.getAttribute('data-id'), this.getAttribute('data-name') );"  data-target=".modal-register-subcategory" data-toggle="modal"> Cadastrar Subcategoria </a>
                                        </li>

                                        <li>
                                            <a href="#" data-id="{{ $category->id }}" data-name="{{ $category->name }}" onclick="ListCategoryController.setDataModalEditCategory(this.getAttribute('data-id'), this.getAttribute('data-name') );" data-target=".modal-edit-category" data-toggle="modal"> Editar Categoria </a>
                                        </li>                                        

                                        <li>
                                            <a href="#" class="jq_remove_category" data-id="{{ $category->id }}" data-name="{{ $category->name }}"> Remover Categoria</a>
                                        </li>
                                     
                                    </ul>

                                </div>
                            </li>
                            @endforeach
                           
                        </ul>
                       
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>
<!-- END PAGE CONTENT INNER -->

<!-- /.modal -->
<div class="modal fade modal-register-category" tabindex="-1" data-width="400">

    <div class="modal-dialog">
        <div class="modal-content">

            <form id="register-category" action="" method="post">                

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title bold">Cadastrar Categoria Principal</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">                    
                            <input type="text" class="col-md-12 form-control" id="value-category-name" placeholder="Nome da Categoria" name="name"> 
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
<div class="modal fade modal-edit-category" tabindex="-1" data-width="400">

    <div class="modal-dialog">
        <div class="modal-content">

            <form id="edit-category" action="">                

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title bold">Editar Categoria Principal</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">                    
                            <input type="text" id="edit-category-name" class="col-md-12 form-control" placeholder="Nome da Categoria" name="name"> 
                            <input type="hidden" name="category_id" id="edit-category-id">
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


<!-- /.modal -->
<div class="modal fade modal-register-subcategory" tabindex="-1" data-width="400">

    <div class="modal-dialog">
        <div class="modal-content">

            <form id="register-subcategory" action="" method="post">                

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title bold">Cadastrar Subcategoria</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">                    
                            <input id="value-subcategory-name" type="text" class="col-md-12 form-control" placeholder="Nome da subcategoria" name="name"> 
                            <input type="hidden" name="category_id" id="register-category-id">
                            <br>
                            <br>
                            <h4>Categoria principal: <span class="bold jq_category_name"></span></h4>
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
<div class="modal fade modal-edit-subcategory" tabindex="-1" data-width="400">

    <div class="modal-dialog">
        <div class="modal-content">

            <form id="edit-subcategory" action="">                

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title bold">Editar Subcategoria</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">                    
                            <input type="text" class="col-md-12 form-control" id="edit-subcategory-name" placeholder="Nome da subcategoria" name="name"> 
                            <input type="hidden" name="subcategory_id" id="edit-subcategory-id">
                            <input type="hidden" name="category_id" id="edit-category-id-per-subcategory">
                            <br>
                            <br>
                            <h4>Categoria principal: <span class="bold jq_category_name"></span></h4>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Fechar</button>
                    <button type="submit" class="btn green">Salvar alterações</button>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection

@section('page-level-plugins-head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<link href="/assets/companies/admin/theme/global/plugins/jstree/dist/themes/default/style.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('page-level-scripts-css')

@endsection

@section('page-level-plugins-body')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

<script src="/assets/companies/admin/theme/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="/assets/companies/admin/theme/pages/scripts/ui-modals.min.js" type="text/javascript"></script>

<!-- * -->
<script src="/assets/companies/admin/theme/global/plugins/jstree/dist/jstree.min.js" type="text/javascript"></script>
<script src="/assets/companies/admin/theme/pages/scripts/ui-tree.min.js" type="text/javascript"></script>
<!-- * -->
@endsection

@section('page-level-scripts-js')
<script src="{{ asset('/assets/companies/admin/js/app/services/HttpService.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/services/ListCategoryService.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/companies/admin/js/app/controllers/ListCategoryController.js') }}" type="text/javascript"></script>

<script>
(function() {
    'use strict';
    var controllerListCategory = new ListCategoryController();
    controllerListCategory.init();
})();
</script>
@endsection