'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var ListCategoryService = function () {
    function ListCategoryService() {
        _classCallCheck(this, ListCategoryService);
    }

    _createClass(ListCategoryService, [{
        key: 'registerCategory',
        value: function registerCategory(element) {

            $(element).on('submit', function (event) {

                event.preventDefault();

                var values = void 0,
                    parameters = void 0,
                    response = void 0;

                values = $(this).serialize();

                $('.modal-register-category').fadeOut('5000', function () {

                    $(this).modal('hide');
                });

                parameters = {
                    data: values,
                    url: '/admin/ajax/category/register/'
                };

                response = HttpService.ajax(parameters);

                response.done(function (data) {

                    if (data.exists === true) {

                        alert('A categoria ' + data.name + ', j\xE1 existe na base de dados!');
                        $('#value-category-name').val('');
                    } else if (data.id > 0) {

                        alert('Nova categoria cadastrada com sucesso!');
                        location.reload();
                    } else {
                        //alert('Houve um erro na solicitação do pedido!');
                        location.reload();
                    }
                });

                response.fail(function () {
                    //alert('Houve um erro na solicitação do pedido!');
                    location.reload();
                });
            });
        }
    }, {
        key: 'editCategory',
        value: function editCategory(element) {

            $(element).on('submit', function (event) {

                event.preventDefault();

                var values = void 0,
                    parameters = void 0,
                    response = void 0;

                values = $(this).serialize();

                $('.modal-edit-category').fadeOut('5000', function () {

                    $(this).modal('hide');
                });

                parameters = {
                    data: values,
                    url: '/admin/ajax/category/update/'
                };

                response = HttpService.ajax(parameters);

                response.done(function (data) {

                    if (data.exists === true) {

                        alert('A categoria ' + data.name + ', j\xE1 existe na base de dados!');
                        $('#value-category-name').val('');
                    } else if (data.category_id > 0) {
                        alert('Categoria alterada com sucesso!');
                        location.reload();
                    } else {
                        //alert('Houve um erro na solicitação do pedido!');
                        location.reload();
                    }
                });

                response.fail(function () {
                    //alert('Houve um erro na solicitação do pedido!');
                    location.reload();
                });
            });
        }
    }, {
        key: 'editSubcategory',
        value: function editSubcategory(element) {

            $(element).on('submit', function (event) {

                event.preventDefault();

                var values = void 0,
                    parameters = void 0,
                    response = void 0;

                values = $(this).serialize();

                $('.modal-edit-subcategory').fadeOut('5000', function () {

                    $(this).modal('hide');
                });

                parameters = {
                    data: values,
                    url: '/admin/ajax/subcategory/update/'
                };

                response = HttpService.ajax(parameters);

                response.done(function (data) {

                    if (data.exists === true) {

                        alert('A subcategoria ' + data.name + ', j\xE1 existe na base de dados!');
                        $('#value-subcategory-name').val('');
                    } else if (data.subcategory_id > 0) {
                        alert('Subcategoria alterada com sucesso!');
                        location.reload();
                    } else {
                        //alert('Houve um erro na solicitação do pedido!');
                        location.reload();
                    }
                });

                response.fail(function () {
                    //alert('Houve um erro na solicitação do pedido!');
                    location.reload();
                });
            });
        }
    }, {
        key: 'registerSubcategory',
        value: function registerSubcategory(element) {

            $(element).on('submit', function (event) {

                event.preventDefault();

                var values = void 0,
                    parameters = void 0,
                    response = void 0;

                values = $(this).serialize();

                $('.modal-register-subcategory').fadeOut('5000', function () {

                    $(this).modal('hide');
                });

                parameters = {
                    data: values,
                    url: '/admin/ajax/subcategory/register/'
                };

                response = HttpService.ajax(parameters);

                response.done(function (data) {

                    if (data.exists === true) {

                        alert('A subcategoria ' + data.name + ', j\xE1 existe na base de dados!');
                        $('#value-subcategory-name').val('');
                    } else if (data.id > 0) {
                        alert('Nova subcategoria cadastrada com sucesso!');
                        location.reload();
                    } else {
                        //alert('Houve um erro na solicitação do pedido!');
                        location.reload();
                    }
                });

                response.fail(function () {
                    //alert('Houve um erro na solicitação do pedido!');
                    location.reload();
                });
            });
        }
    }, {
        key: 'removeCategory',
        value: function removeCategory(element) {

            $(element).on('click', function () {

                var textContent = void 0,
                    elemHtml = void 0,
                    category_name = void 0,
                    categoryId = void 0,
                    dataTo = void 0,
                    parameters = void 0,
                    txtAlert = void 0,
                    response = void 0;

                elemHtml = $(this);
                categoryId = $(this).data('id');

                category_name = $(this).data('name');

                textContent = 'Tem certeza que deseja remover a categoria <strong>' + category_name + '</strong> permanentemente?';

                $.confirm({
                    icon: 'fa fa-info-circle',
                    type: 'dark',
                    typeAnimated: true,
                    title: 'Confirmação!',
                    content: textContent,
                    buttons: {
                        cancel: {
                            text: 'Cancelar',
                            keys: ['esc'],
                            action: function action() {
                                $.alert('Cancelado!');
                            }

                        },

                        confirm: {
                            text: 'Confirmar',
                            btnClass: 'btn-blue',
                            keys: ['enter'],
                            action: function action() {

                                dataTo = {
                                    id: categoryId
                                };

                                parameters = {
                                    data: dataTo,
                                    url: '/admin/ajax/category/remove/'
                                };

                                response = HttpService.ajax(parameters);

                                response.done(function (data) {

                                    if (data.exists === true) {

                                        if (data.total <= 1) {

                                            txtAlert = 'Solicita\xE7\xE3o Negada! Existe ' + data.total + ' empresa cadastrada nesta categoria!';

                                            toastr["warning"](txtAlert);
                                            $.alert(txtAlert);
                                        } else {

                                            txtAlert = 'Solicita\xE7\xE3o Negada! Existem ' + data.total + ' empresas cadastradas nesta categoria!';

                                            toastr["warning"](txtAlert);
                                            $.alert(txtAlert);
                                        }
                                    } else if (data.id) {
                                        toastr["success"]("Categoria foi excluída com sucesso!");
                                        elemHtml.parents('li').hide(3000);
                                    } else {
                                        //alert('Houve um erro na solicitação do pedido!');
                                        location.reload();
                                    }
                                });

                                response.fail(function () {
                                    //alert('Houve um erro na solicitação do pedido!');
                                    location.reload();
                                });
                            }

                        }

                    }

                });
            });
        }
    }, {
        key: 'removeSubcategory',
        value: function removeSubcategory(element) {

            $(document).on('click', '.jq_remove_subcategory', function () {

                var textContent = void 0,
                    elemHtml = void 0,
                    subCategoryName = void 0,
                    subCategoryId = void 0,
                    dataTo = void 0,
                    parameters = void 0,
                    txtAlert = void 0,
                    response = void 0;

                elemHtml = $(this);
                subCategoryId = $(this).data('id');

                subCategoryName = $(this).data('name');

                textContent = 'Tem certeza que deseja remover a subcategoria <strong>' + subCategoryName + '</strong> permanentemente?';

                $.confirm({
                    icon: 'fa fa-info-circle',
                    type: 'dark',
                    typeAnimated: true,
                    title: 'Confirmação!',
                    content: textContent,
                    buttons: {
                        cancel: {
                            text: 'Cancelar',
                            keys: ['esc'],
                            action: function action() {
                                $.alert('Cancelado!');
                            }

                        },

                        confirm: {
                            text: 'Confirmar',
                            btnClass: 'btn-blue',
                            keys: ['enter'],
                            action: function action() {

                                dataTo = {
                                    id: subCategoryId
                                };

                                parameters = {
                                    data: dataTo,
                                    url: '/admin/ajax/subcategory/remove/'
                                };

                                response = HttpService.ajax(parameters);

                                response.done(function (data) {

                                    if (data.exists === true) {

                                        if (data.total <= 1) {

                                            txtAlert = 'Solicita\xE7\xE3o Negada! Existe ' + data.total + ' empresa cadastrada nesta subcategoria!';

                                            toastr["warning"](txtAlert);
                                            $.alert(txtAlert);
                                        } else {

                                            txtAlert = 'Solicita\xE7\xE3o Negada! Existem ' + data.total + ' empresas cadastradas nesta subcategoria!';

                                            toastr["warning"](txtAlert);
                                            $.alert(txtAlert);
                                        }
                                    } else if (data.id) {
                                        toastr["success"]("Subcategoria foi excluída com sucesso!");
                                        elemHtml.parents('[data-jstree]').hide(3000);
                                    } else {
                                        //alert('Houve um erro na solicitação do pedido!');
                                        location.reload();
                                    }
                                });

                                response.fail(function () {
                                    //alert('Houve um erro na solicitação do pedido!');
                                    location.reload();
                                });
                            }

                        }

                    }

                });
            });
        }
    }]);

    return ListCategoryService;
}();
//# sourceMappingURL=ListCategoryService.js.map