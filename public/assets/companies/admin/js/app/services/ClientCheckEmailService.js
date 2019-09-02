'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var ClientCheckEmailService = function () {
    function ClientCheckEmailService() {
        _classCallCheck(this, ClientCheckEmailService);
    }

    _createClass(ClientCheckEmailService, null, [{
        key: 'ckeckEmailExists',
        value: function ckeckEmailExists() {

            $(document).on('blur', 'input[name="email_primary"]', function () {

                var email = $(this).val();

                if (ValidateHelper.validateEmail(email)) {
                    ClientCheckEmailService._checkData(email);
                }
            });

            $(document).on('blur', 'input[name="email_secondary"]', function () {

                var email = $(this).val();

                if (ValidateHelper.validateEmail(email)) {
                    ClientCheckEmailService._checkData(email);
                }
            });
        }
    }, {
        key: '_checkData',
        value: function _checkData(email, element) {

            var cpf_cnpj = $('input[name="cpf_cnpj"]').val().replace(/[^0-9]/g, '').toString();

            var parameters = {
                data: {
                    email: email,
                    cpf_cnpj: cpf_cnpj
                },
                url: '/admin/ajax/client/check/email/'
            };

            var response = HttpService.ajax(parameters);

            response.done(function (res) {
                if (res.id > 0) {
                    ClientCheckEmailService.boxSwal(element, res.company_name, res.cpf_cnpj);
                }
            });

            response.fail(function () {
                //alert('Houve um erro na solicitação do pedido, tente novamente!');
                //location.reload();
            });
        }
    }, {
        key: 'boxSwal',
        value: function boxSwal(element, nameCompany, cpf_cnpj) {

            swal({

                title: 'Endere\xE7o de email j\xE1 est\xE1 em uso por: <br /><span style=\'color:red\'><strong>' + nameCompany + '.</strong></span>',
                text: 'CPF/CNPJ <strong>' + cpf_cnpj + '</strong>',
                type: "warning",
                html: true,

                confirmButtonClass: "btn-success",
                confirmButtonText: "OK ???",
                closeOnConfirm: true,
                closeOnCancel: false

            }, function (isConfirm) {

                if (!isConfirm) {

                    element.val('');

                    swal({
                        html: true,
                        title: "Cancelado!",
                        text: 'Cadastro de email cancelado com sucesso.',
                        type: "success"
                    });
                }
            });
        }
    }]);

    return ClientCheckEmailService;
}();
//# sourceMappingURL=ClientCheckEmailService.js.map