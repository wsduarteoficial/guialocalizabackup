'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var ListCompanyService = function () {
    function ListCompanyService() {
        _classCallCheck(this, ListCompanyService);
    }

    _createClass(ListCompanyService, [{
        key: 'categoriesActive',
        value: function categoriesActive() {
            var parameters = void 0;
            parameters = {
                url: '/admin/ajax/category/active/'
            };
            return HttpService.ajax(parameters);
        }
    }, {
        key: 'plansActive',
        value: function plansActive() {
            var parameters = void 0;
            parameters = {
                url: '/admin/ajax/plan/active/'
            };
            return HttpService.ajax(parameters);
        }
    }, {
        key: 'statesActive',
        value: function statesActive() {
            var parameters = void 0;
            parameters = {
                url: '/admin/ajax/state/active/'
            };
            return HttpService.ajax(parameters);
        }
    }, {
        key: 'companyRemove',
        value: function companyRemove(element) {

            $(element).bind('click', function () {

                var textContent = void 0,
                    elemRemove = void 0,
                    parameters = void 0,
                    response = void 0;

                elemRemove = $(this);
                textContent = 'Tem certeza que deseja enviar para a lixeira <b>' + elemRemove.data('name') + '</>?';

                $.confirm({
                    icon: 'fa fa-info-circle',
                    type: 'red',
                    typeAnimated: true,
                    title: 'Confirmação de exclusão!',
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
                                        toastr["success"]("Dados enviados para a lixeira sucesso!");
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
    }, {
        key: 'companyUpdateStatus',
        value: function companyUpdateStatus(element) {

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
    }, {
        key: 'changeColorElementTr',
        value: function changeColorElementTr(element) {

            $(element).map(function () {
                if ($(this).is(":checked")) {
                    $(this).parents('tr').removeClass('item_inative');
                } else {
                    $(this).parents('tr').addClass('item_inative');
                }
            });
        }
    }, {
        key: 'companyFormSearch',
        value: function companyFormSearch(element) {

            var search = $.urlParam('name_fantasy');
            var active = $.urlParam('active');
            var numberPhone = $.urlParam('numberPhone');
            var phone = $.urlParam('phone');
            var plan = $.urlParam('plan');

            if (search) {
                $('input[type=search]').val(search.replace(/\+/g, ' '));
            }

            $('input:radio[name=active]').removeAttr('checked');
            $('#active-' + active).prop("checked", true);

            if (numberPhone) {
                $('input[name=numberPhone]').val(numberPhone.replace(/\+/g, ' '));
            }

            $('input:radio[name=phone]').removeAttr('checked');
            $('#phone-' + phone).prop("checked", true);
        }
    }], [{
        key: 'citiesActive',
        value: function citiesActive(stateId) {
            var parameters = void 0;
            parameters = {
                data: { state_id: stateId },
                url: '/admin/ajax/city/active/'
            };
            return HttpService.ajax(parameters);
        }
    }]);

    return ListCompanyService;
}();
//# sourceMappingURL=ListCompanyService.js.map