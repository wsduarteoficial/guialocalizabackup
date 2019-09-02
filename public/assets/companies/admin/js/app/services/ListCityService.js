'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var ListCityService = function () {
    function ListCityService() {
        _classCallCheck(this, ListCityService);
    }

    _createClass(ListCityService, [{
        key: 'updateStatus',
        value: function updateStatus(element) {

            $(element).on('change', function () {

                var elemStatus = $(this);
                ListCityService._changeStatus(elemStatus);
            });
        }
    }, {
        key: 'registerCity',
        value: function registerCity(element) {

            $(element).on('submit', function (event) {

                event.preventDefault();

                var values = void 0,
                    parameters = void 0,
                    response = void 0;

                values = $(this).serialize();

                $('.modal-register').fadeOut('5000', function () {
                    $(this).modal('hide');
                });

                parameters = {
                    data: values,
                    url: '/admin/ajax/city/register/'
                };

                response = HttpService.ajax(parameters);

                response.done(function (data) {

                    if (data.exists === true) {

                        alert('A cidade ' + data.name + ', j\xE1 existe na base de dados!');
                        $('#value-city-name').val('');
                    } else if (data.id > 0) {

                        ListCityService._trTable(data);

                        toastr["success"]("Nova cidade cadastrada com sucesso!");
                    } else {
                        if (data.exists === true) {
                            alert('Cidade ' + data.name + ' j\xE1 existe na base de dados!');
                        } else {
                            //alert('Houve um erro na solicitação do pedido!');
                            location.reload();
                        }
                    }
                });

                response.fail(function () {
                    //alert('Houve um erro na solicitação do pedido!');
                    location.reload();
                });
            });
        }
    }, {
        key: 'editCity',
        value: function editCity(element) {

            $(element).submit(function (event) {

                event.preventDefault();

                var values = void 0,
                    parameters = void 0,
                    response = void 0;

                values = $(this).serialize();

                $('.modal-edit').fadeOut('5000', function () {
                    $(this).modal('hide');
                });

                parameters = {
                    data: values,
                    url: '/admin/ajax/city/edit/'
                };

                response = HttpService.ajax(parameters);

                response.done(function (data) {

                    if (data.city_id > 0) {

                        $('.jq_city_name_' + data.city_id).text(data.name);

                        toastr["success"]("Cidade alterada com sucesso!");

                        $.alert('Dados alterados com Sucesso. <br>Atualizando lista de registros!');

                        setInterval(function () {
                            location.reload();
                        }, 3000);
                    } else {
                        if (data.exists === true) {
                            alert('Cidade ' + data.name + ' j\xE1 existe na base de dados!');
                        } else {
                            //alert('Houve um erro na solicitação do pedido!');
                            location.reload();
                        }
                    }
                });

                response.fail(function () {
                    //alert('Houve um erro na solicitação do pedido!');
                    location.reload();
                });
            });
        }
    }, {
        key: 'removeCity',
        value: function removeCity(element) {

            $(element).on('click', function () {

                var textContent = void 0,
                    element_html = void 0,
                    city_name = void 0,
                    city_id = void 0,
                    dataTo = void 0,
                    parameters = void 0,
                    response = void 0;

                element_html = $(this);
                city_id = $(this).data('id');
                city_name = $(this).data('name');

                textContent = 'Tem certeza que deseja remover a cidade <strong>' + city_name + '</strong> permanentemente?';

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

                                element_html.parents('tr').addClass('item_inative').hide(4000);

                                dataTo = {
                                    id: city_id
                                };

                                parameters = {
                                    data: dataTo,
                                    url: '/admin/ajax/city/remove/'
                                };

                                response = HttpService.ajax(parameters);

                                response.done(function (data) {

                                    if (data) {
                                        toastr["success"]("Cidade foi excluída com sucesso!");
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
    }], [{
        key: 'changeStatusDocument',
        value: function changeStatusDocument(document) {

            ListCityService._changeStatus(document);
        }
    }, {
        key: '_changeStatus',
        value: function _changeStatus(elemStatus) {

            var textContent = void 0,
                typeStatus = void 0,
                dataTo = void 0,
                parameters = void 0,
                response = void 0;

            if (elemStatus.is(":checked")) {
                typeStatus = 'ON';
            } else {
                typeStatus = 'OFF';
            }

            textContent = 'Tem certeza que deseja mudar o status para <strong>' + typeStatus + '</strong>\n            em <strong>' + elemStatus.data('name') + '</strong>?';

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
                            location.reload();
                        }

                    },

                    confirm: {
                        text: 'Confirmar',
                        btnClass: 'btn-blue',
                        keys: ['enter'],
                        action: function action() {

                            if (elemStatus.is(":checked")) {

                                elemStatus.val(1).parents('tr').addClass('color_status');
                            } else {

                                elemStatus.val(0).parents('tr').removeClass('color_status');
                            }

                            dataTo = {
                                id: elemStatus.data('id'),
                                active: elemStatus.val()
                            };

                            parameters = {
                                data: dataTo,
                                url: '/admin/ajax/city/update/status/'
                            };

                            response = HttpService.ajax(parameters);

                            response.done(function (data) {

                                if (data.active <= 0) {
                                    toastr["info"]("Cidade foi desativada com sucesso!");
                                } else {
                                    toastr["success"]("Cidade foi ativada com sucesso!");
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
        }
    }, {
        key: '_trTable',
        value: function _trTable(data) {

            var html = void 0;

            html = '\n            <tr class="odd gradeX color_status">\n            <td>' + data.id + '</td>\n            <td>' + data.name + '</td>\n            <td>' + data.name_state + '</td>\n\n            <td class="center">  \n                <input type="checkbox" id="toogle-register" class="jq_status_city" value="0" data-id="' + data.id + '" data-name="' + data.name + '" data-toggle="toggle" data-onstyle="success"> \n            </td>\n          \n            <td>\n                <div class="btn-group">\n                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> A\xE7\xE3o\n                        <i class="fa fa-angle-down"></i>\n                    </button>\n                    <ul class="dropdown-menu" role="menu">\n                        \n                        <li>                   \n                            <a href="#"  data-id="' + data.id + '" data-name="' + data.name + '" onclick="ListCityController.setDataModalEdit(this.getAttribute(\'data-id\'), this.getAttribute(\'data-name\') );"  data-target=".modal-edit" data-toggle="modal">\n                                <i class="fa fa-edit"></i> Editar \n                            </a>\n                        </li>\n\n                        <li>\n                            <a href="#" class="jq_remove_city">\n                                <i class="fa fa-times"></i> Remover </a>\n                        </li>\n                        \n                        <li>\n                            <a href="javascript:;">\n                                <i class="fa fa-circle"></i> Ver Bairros </a>\n                        </li>\n\n                        <li>\n                            <a href="javascript:;">\n                                <i class="fa fa-circle"></i> Ver CEPs </a>\n                        </li>\n\n                        <li>\n                            <a href="javascript:;">\n                                <i class="fa fa-circle"></i> Ver Logradouros </a>\n                        </li>                        \n\n                    </ul>\n                </div>\n            </td>\n\n        </tr>';

            $(".appendedContainer").prepend(html);
            $('#toogle-register').bootstrapToggle();
            $.alert('Dados cadastrados com Sucesso. <br>Atualizando lista de registros!');

            setInterval(function () {
                location.reload();
            }, 3000);
        }
    }]);

    return ListCityService;
}();
//# sourceMappingURL=ListCityService.js.map