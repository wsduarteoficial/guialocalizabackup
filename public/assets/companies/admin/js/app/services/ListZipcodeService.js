'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var ListZipcodeService = function () {
    function ListZipcodeService() {
        _classCallCheck(this, ListZipcodeService);
    }

    _createClass(ListZipcodeService, [{
        key: 'updateStatus',
        value: function updateStatus(element) {

            $(element).on('change', function () {

                var elemStatus = $(this);
                ListZipcodeService._changeStatus(elemStatus);
            });
        }
    }, {
        key: 'registerZipcode',
        value: function registerZipcode(element) {

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
                    url: '/admin/ajax/zipcode/register/'
                };

                response = HttpService.ajax(parameters);

                response.done(function (data) {

                    if (data.id > 0) {

                        ListZipcodeService._trTable(data);

                        toastr["success"]("Novo CEP cadastrado com sucesso!");
                    } else {

                        if (data.exists === true) {
                            alert('CEP ' + data.code + ' j\xE1 existe na base de dados!');
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
        key: 'editZipcode',
        value: function editZipcode(element) {

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
                    url: '/admin/ajax/zipcode/edit/'
                };

                response = HttpService.ajax(parameters);

                response.done(function (data) {

                    if (data.zipcode_id > 0) {

                        $('.jq_zipcodeName_' + data.zipcode_id).text(data.code);
                        toastr["success"]("CEP alterado com sucesso!");

                        $.alert('Dados alterados com Sucesso. <br>Atualizando lista de registros!');

                        setInterval(function () {
                            location.reload();
                        }, 3000);
                    } else {
                        if (data.exists === true) {
                            alert('CEP ' + data.code + ' j\xE1 existe na base de dados!');
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
        key: 'removeZipcode',
        value: function removeZipcode(element) {

            $(element).on('click', function () {

                var textContent = void 0,
                    elementHtml = void 0,
                    zipcodeName = void 0,
                    zipcodeId = void 0,
                    dataTo = void 0,
                    parameters = void 0,
                    response = void 0;

                elementHtml = $(this);
                zipcodeId = $(this).data('id');
                zipcodeName = $(this).data('name');

                textContent = 'Tem certeza que deseja remover o CEP <strong>' + zipcodeName + '</strong> permanentemente?';

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

                                elementHtml.parents('tr').addClass('item_inative').hide(4000);

                                dataTo = {
                                    id: zipcodeId
                                };

                                parameters = {
                                    data: dataTo,
                                    url: '/admin/ajax/zipcode/remove/'
                                };

                                response = HttpService.ajax(parameters);

                                response.done(function (data) {

                                    if (data) {
                                        toastr["success"]("O CEP foi excluído com sucesso!");
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

            ListZipcodeService._changeStatus(document);
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
                                url: '/admin/ajax/zipcode/update/status/'
                            };

                            response = HttpService.ajax(parameters);

                            response.done(function (data) {

                                if (data.active <= 0) {
                                    toastr["info"]("CEP foi desativado com sucesso!");
                                } else {
                                    toastr["success"]("CEP foi ativado com sucesso!");
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

            html = '\n            <tr class="odd gradeX color_status">\n            <td>' + data.id + '</td>\n            <td>' + data.code + '</td>\n            <td>' + data.city_state + '</td>\n\n            <td class="center">  \n                <input type="checkbox" id="toogle-register" class="jq_status_zipcode" value="0" data-id="' + data.id + '" data-name="' + data.name + '" data-toggle="toggle" data-onstyle="success"> \n            </td>\n          \n            <td>\n                <div class="btn-group">\n                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> A\xE7\xE3o\n                        <i class="fa fa-angle-down"></i>\n                    </button>\n                    <ul class="dropdown-menu" role="menu">\n                        \n                        <li>                   \n                            <a href="#"  data-id="' + data.id + '" data-name="' + data.name + '" onclick="ListZipcodeController.setDataModalEdit(this.getAttribute(\'data-id\'), this.getAttribute(\'data-name\') );"  data-target=".modal-edit" data-toggle="modal">\n                                <i class="fa fa-edit"></i> Editar \n                            </a>\n                        </li>\n\n                        <li>\n                            <a href="#" class="jq_remove_zipcode">\n                                <i class="fa fa-times"></i> Remover </a>\n                        </li>\n                  \n                    </ul>\n                </div>\n            </td>\n\n        </tr>';

            $(".appendedContainer").prepend(html);
            $('#toogle-register').bootstrapToggle();
            $.alert('Dados cadastrados com Sucesso. <br>Atualizando lista de registros!');

            setInterval(function () {
                location.reload();
            }, 3000);
        }
    }]);

    return ListZipcodeService;
}();
//# sourceMappingURL=ListZipcodeService.js.map