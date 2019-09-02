'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var PhoneService = function () {
    function PhoneService() {
        _classCallCheck(this, PhoneService);
    }

    _createClass(PhoneService, null, [{
        key: 'cleanInput',
        value: function cleanInput(el) {
            var phoneId = el.data('phone-id');
            $('.jq_phone_number' + phoneId).val('');
        }
    }, {
        key: 'boxSwal',
        value: function boxSwal(el, dataTo) {

            swal({

                title: 'Remover n\xFAmero <span style=\'color:red\'><strong>' + dataTo.number + '</strong></span>',
                text: "Deseja realmente remover este número?",
                type: "warning",
                html: true,

                showCancelButton: true,
                cancelButtonClass: "btn-danger",
                cancelButtonText: "NÃO",
                confirmButtonClass: "btn-success",
                confirmButtonText: "SIM",
                closeOnConfirm: false,
                closeOnCancel: false

            }, function (isConfirm) {

                if (isConfirm) {

                    PhoneService.remove(el, dataTo);
                } else {

                    swal({
                        html: true,
                        title: "Cancelado!",
                        text: 'Solicita\xE7\xE3o de remo\xE7\xE3o de telefone, cancelada com sucesso.',
                        type: "success"
                    });
                }
            });
        }
    }, {
        key: 'remove',
        value: function remove(el, dataTo) {

            var parameters = {
                data: dataTo,
                url: '/admin/ajax/phone/remove/item/'
            };

            var response = HttpService.ajax(parameters);

            response.done(function (data) {

                if (data.removed === true) {

                    swal({
                        html: true,
                        title: "ATENÇÃO!",
                        text: 'O n\xFAmero <span style=\'color:red\'><strong>' + dataTo.number + '</strong></span> foi removido com sucesso.',
                        type: "success"
                    });

                    PhoneService.cleanInput(el);
                } else {
                    toastr["error"]('Houve um erro na solicitação do pedido!');
                }
            });

            response.fail(function () {
                //alert('Houve um erro na solicitação do pedido!');
            });
        }
    }, {
        key: 'removeItem',
        value: function removeItem(el) {

            var phoneId = el.data('phone-id');
            var number = $('.jq_phone_number' + phoneId).val();

            var dataTo = {
                'phone_id': phoneId,
                'number': number,
                'company_id': el.data('company-id')
            };

            PhoneService.boxSwal(el, dataTo);
        }
    }]);

    return PhoneService;
}();
//# sourceMappingURL=PhoneService.js.map