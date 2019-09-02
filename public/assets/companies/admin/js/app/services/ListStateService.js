'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var ListStateService = function () {
    function ListStateService() {
        _classCallCheck(this, ListStateService);
    }

    _createClass(ListStateService, [{
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

                textContent = 'Tem certeza que deseja mudar o status para <strong>' + typeStatus + '</strong>\n                em <strong>' + elemStatus.data('name') + '</strong>?';

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
                                    url: '/admin/ajax/state/update/status/'
                                };

                                response = HttpService.ajax(parameters);

                                response.done(function (data) {

                                    if (data.active <= 0) {
                                        toastr["info"]("Estado foi desativado com sucesso!");
                                    } else {
                                        toastr["success"]("Estado foi ativado com sucesso!");
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

    return ListStateService;
}();
//# sourceMappingURL=ListStateService.js.map