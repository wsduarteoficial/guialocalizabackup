'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var ListDistrictService = function () {
    function ListDistrictService() {
        _classCallCheck(this, ListDistrictService);
    }

    _createClass(ListDistrictService, [{
        key: 'updateStatus',
        value: function updateStatus(element) {

            $(element).on('change', function () {

                var elemStatus = $(this);
                ListDistrictService._changeStatus(elemStatus);
            });
        }
    }, {
        key: 'registerDistrict',
        value: function registerDistrict(element) {

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
                    url: '/admin/ajax/district/register/'
                };

                response = HttpService.ajax(parameters);

                response.done(function (data) {

                    if (data.id > 0) {

                        ListDistrictService._trTable(data);

                        toastr["success"]("Novo bairro cadastrado com sucesso!");
                    } else {
                        if (data.exists === true) {
                            alert('Bairro ' + data.name + ' j\xE1 existe na base de dados!');
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
        key: 'editDistrict',
        value: function editDistrict(element) {

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
                    url: '/admin/ajax/district/edit/'
                };

                response = HttpService.ajax(parameters);

                response.done(function (data) {

                    if (data.district_id > 0) {

                        $('.jq_district_name_' + data.district_id).text(data.name);
                        toastr["success"]("Bairro alterado com sucesso!");

                        $.alert('Dados alterados com Sucesso. <br>Atualizando lista de registros!');

                        setInterval(function () {
                            location.reload();
                        }, 3000);
                    } else {

                        if (data.exists === true) {
                            alert('Bairro ' + data.name + ' j\xE1 existe na base de dados!');
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
        key: 'removeDistrict',
        value: function removeDistrict(element) {

            $(element).on('click', function () {

                var textContent = void 0,
                    element_html = void 0,
                    district_name = void 0,
                    district_id = void 0,
                    dataTo = void 0,
                    parameters = void 0,
                    response = void 0;

                element_html = $(this);
                district_id = $(this).data('id');
                district_name = $(this).data('name');

                textContent = 'Tem certeza que deseja remover o bairro <strong>' + district_name + '</strong> permanentemente?';

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
                                    id: district_id
                                };

                                parameters = {
                                    data: dataTo,
                                    url: '/admin/ajax/district/remove/'
                                };

                                response = HttpService.ajax(parameters);

                                response.done(function (data) {

                                    if (data) {
                                        toastr["success"]("O Bairro foi excluído com sucesso!");
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

            ListDistrictService._changeStatus(document);
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
                                url: '/admin/ajax/district/update/status/'
                            };

                            response = HttpService.ajax(parameters);

                            response.done(function (data) {

                                if (data.active <= 0) {
                                    toastr["info"]("Bairro foi desativado com sucesso!");
                                } else {
                                    toastr["success"]("Bairro foi ativado com sucesso!");
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

            html = '\n            <tr class="odd gradeX color_status">\n            <td>' + data.id + '</td>\n            <td>' + data.name + '</td>\n            <td>' + data.city_state + '</td>\n\n            <td class="center">  \n                <input type="checkbox" id="toogle-register" class="jq_status_district" value="0" data-id="' + data.id + '" data-name="' + data.name + '" data-toggle="toggle" data-onstyle="success"> \n            </td>\n          \n            <td>\n                <div class="btn-group">\n                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> A\xE7\xE3o\n                        <i class="fa fa-angle-down"></i>\n                    </button>\n                    <ul class="dropdown-menu" role="menu">\n                        \n                        <li>                   \n                            <a href="#"  data-id="' + data.id + '" data-name="' + data.name + '" onclick="ListDistrictController.setDataModalEdit(this.getAttribute(\'data-id\'), this.getAttribute(\'data-name\') );"  data-target=".modal-edit" data-toggle="modal">\n                                <i class="fa fa-edit"></i> Editar \n                            </a>\n                        </li>\n\n                        <li>\n                            <a href="#" class="jq_remove_district">\n                                <i class="fa fa-times"></i> Remover </a>\n                        </li>\n                  \n                    </ul>\n                </div>\n            </td>\n\n        </tr>';

            $(".appendedContainer").prepend(html);
            $('#toogle-register').bootstrapToggle();
            $.alert('Dados cadastrados com Sucesso. <br>Atualizando lista de registros!');

            setInterval(function () {
                location.reload();
            }, 3000);
        }
    }]);

    return ListDistrictService;
}();
//# sourceMappingURL=ListDistrictService.js.map