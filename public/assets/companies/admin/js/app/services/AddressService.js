'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var CompanyAddressService = function () {
    function CompanyAddressService() {
        _classCallCheck(this, CompanyAddressService);
    }

    _createClass(CompanyAddressService, null, [{
        key: 'fillData',
        value: function fillData(data) {

            console.log(data);
            $('input[name="city_id"').val(data.cidade);
            $('input[name="district_id"').val(data.bairro);
            $('input[name="place_id"').val(data.logradouro);

            $('.jq_address').removeAttr("disabled");

            var optionState = $('<option>').text(data.estado).attr("selected", true);

            $('select[name="state_id"').append(optionState);

            var optionCity = $('<option>').text(data.cidade).attr("selected", true);

            $('select[name="city_id"').append(optionCity);
        }
    }, {
        key: 'checkZipCode',
        value: function checkZipCode() {

            $('input[name=zipcode_id]').on('keyup', function () {

                var number = $(this).val().replace(/[^0-9]/g, '').toString();

                if (number.length >= 8) {

                    var parameters = {
                        data: { number: number },
                        url: '/admin/ajax/address/check/zipcode/'
                    };

                    var response = HttpService.ajax(parameters);

                    response.done(function (data) {
                        AddressService.fillData(data);
                    });

                    response.fail(function () {

                        //console.log(number.length);
                        //alert('Houve um erro na solicitação do pedido!');
                        //location.reload();
                    });
                }
            });
        }
    }]);

    return CompanyAddressService;
}();
//# sourceMappingURL=AddressService.js.map