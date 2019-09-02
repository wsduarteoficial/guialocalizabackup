'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var CompanyUpdateStatusService = function () {
    function CompanyUpdateStatusService() {
        _classCallCheck(this, CompanyUpdateStatusService);
    }

    _createClass(CompanyUpdateStatusService, null, [{
        key: 'updateStatusEdit',
        value: function updateStatusEdit() {

            $(document).on('change', '.jq_change_status_company', function () {

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
                                    elemStatus.val(1).parents('tr').removeClass('item_inative').hide(4000);
                                } else {

                                    elemStatus.val(0).parents('tr').addClass('item_inative').hide(4000);
                                }

                                dataTo = {
                                    id: elemStatus.data('id'),
                                    active: elemStatus.val()
                                };

                                parameters = {
                                    data: dataTo,
                                    url: '/admin/ajax/company/update/status/active/'
                                };

                                response = HttpService.ajax(parameters);

                                response.done(function (data) {

                                    if (data.active <= 0) {
                                        toastr["info"]("Empresa foi removida do índice de pesquisa.", "ATENÇÃO!");
                                        location.href = elemStatus.data('url-redirect');
                                    } else {
                                        toastr["success"]("Empresa incluída no índice de pesquisa com sucesso!");
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

    return CompanyUpdateStatusService;
}();
//# sourceMappingURL=CompanyUpdateStatusService.js.map