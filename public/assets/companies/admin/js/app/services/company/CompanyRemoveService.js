'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var CompanyRemoveService = function () {
    function CompanyRemoveService() {
        _classCallCheck(this, CompanyRemoveService);
    }

    _createClass(CompanyRemoveService, null, [{
        key: 'removeCompanyEdit',
        value: function removeCompanyEdit() {

            $(document).on('click', '.jq_remove_company', function () {

                var textContent = void 0,
                    elemRemove = void 0,
                    parameters = void 0,
                    response = void 0;

                elemRemove = $(this);
                textContent = 'Tem certeza que deseja remover permanentemente <b>' + elemRemove.data('name') + '</>?';

                $.confirm({
                    icon: 'fa fa-info-circle',
                    type: 'red',
                    typeAnimated: true,
                    title: 'Confirmação de Remoção!',
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

                                elemRemove.parents('tr').addClass('item_inative').hide(4000);

                                parameters = {
                                    data: {
                                        id: elemRemove.data('id')
                                    },
                                    url: '/admin/ajax/company/remove/'
                                };

                                response = HttpService.ajax(parameters);

                                response.done(function (data) {

                                    if (data.success === true) {
                                        toastr["success"]("Dados removidos com sucesso!");

                                        location.href = elemRemove.data('url-redirect');
                                    } else {
                                        toastr["info"]("Houve um erro na solicitação do pedido!", "ATENÇÃO!");
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

    return CompanyRemoveService;
}();
//# sourceMappingURL=CompanyRemoveService.js.map