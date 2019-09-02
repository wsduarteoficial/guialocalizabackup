'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var ClientService = function () {
    function ClientService() {
        _classCallCheck(this, ClientService);
    }

    _createClass(ClientService, null, [{
        key: 'fillData',
        value: function fillData(data) {

            $('input[name="company_name"').val(data.company_name);
            $('input[name="contracting_name"').val(data.contracting_name);
            $('input[name="phone"').val(data.phone);
            $('input[name="email_primary"').val(data.email_primary);
            $('input[name="email_secundary"').val(data.email_secundary);
            //$('input[name="cpf_cnpj"').val(data.cpf_cnpj);
        }
    }, {
        key: 'checkIsExistsCpfCnpj',
        value: function checkIsExistsCpfCnpj() {

            $('input[name=cpf_cnpj]').blur(function () {

                var number = $(this).val().replace(/[^0-9]/g, '').toString();

                if (number.length >= 11) {

                    var parameters = {
                        data: { number: number },
                        url: '/admin/ajax/client/check/cpf_cnpj/'
                    };

                    var response = HttpService.ajax(parameters);

                    response.done(function (data) {
                        ClientService.fillData(data);
                    });

                    response.fail(function () {
                        alert('Houve um erro na solicitação do pedido!');
                        location.reload();
                    });
                }
            });
        }
    }]);

    return ClientService;
}();
//# sourceMappingURL=ClientService.1.js.map