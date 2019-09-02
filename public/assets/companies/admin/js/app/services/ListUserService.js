'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var ListUserService = function () {
    function ListUserService() {
        _classCallCheck(this, ListUserService);
    }

    _createClass(ListUserService, [{
        key: 'updateStatus',
        value: function updateStatus(element) {

            $(element).on('change', function () {

                var textContent = void 0,
                    elemStatus = void 0,
                    typeStatus = void 0,
                    dataTo = void 0,
                    parameters = void 0,
                    response = void 0;

                elemStatus = $(this);

                if (elemStatus.is(":checked")) {
                    typeStatus = 'ON';
                } else {
                    typeStatus = 'OFF';
                }

                textContent = 'Tem certeza que deseja mudar o status para <strong>' + typeStatus + '</strong>\n                de <strong>' + elemStatus.data('name') + '</strong>?';

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
                                    url: '/admin/ajax/user/update/status/'
                                };

                                response = HttpService.ajax(parameters);

                                response.done(function (data) {

                                    if (data.active <= 0) {
                                        toastr["info"]("Usuário foi desativado com sucesso!");
                                    } else {
                                        toastr["success"]("Usuário foi ativado com sucesso!");
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
        key: 'removeUser',
        value: function removeUser(element) {

            $(element).on('click', function () {

                var textContent = void 0,
                    elemHtml = void 0,
                    userName = void 0,
                    userId = void 0,
                    dataTo = void 0,
                    parameters = void 0,
                    response = void 0;

                elemHtml = $(this);
                userId = $(this).data('id');
                userName = $(this).data('name');

                textContent = 'Tem certeza que deseja remover o Usu\xE1rio <strong>' + userName + '</strong> permanentemente?';

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

                                elemHtml.parents('tr').addClass('item_inative').hide(4000);

                                dataTo = {
                                    id: userId
                                };

                                parameters = {
                                    data: dataTo,
                                    url: '/admin/ajax/user/remove/'
                                };

                                response = HttpService.ajax(parameters);

                                response.done(function (data) {

                                    if (data) {
                                        toastr["success"]("O Usuário foi excluído com sucesso!");
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

    return ListUserService;
}();
//# sourceMappingURL=ListUserService.js.map