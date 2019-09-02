'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var CompanyAddressService = function () {
    function CompanyAddressService() {
        _classCallCheck(this, CompanyAddressService);
    }

    _createClass(CompanyAddressService, null, [{
        key: 'autoCompleteDistrict',
        value: function autoCompleteDistrict() {
            var cityId = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';


            var destrict = $('input[name=district]');

            $(destrict).on('keydown', function () {

                var cityId = $("select[name=city_id] option:selected").val();

                $(destrict).autocomplete({
                    minChars: 2,
                    maxHeight: 200,
                    serviceUrl: '/admin/ajax/district/city/all/',
                    params: { 'city_id': cityId },
                    clearCache: true,
                    onSelect: function onSelect(suggestion) {
                        $('input[name=district_id').val(suggestion.data);
                    }
                });
            });
        }
    }, {
        key: 'autoCompletePlace',
        value: function autoCompletePlace() {

            var place = $('input[name=place]');

            $(place).on('keydown', function () {

                var cityId = $("select[name=city_id] option:selected").val();

                $(place).autocomplete({
                    minChars: 2,
                    maxHeight: 200,
                    serviceUrl: '/admin/ajax/place/city/all/',
                    params: { 'city_id': cityId },
                    clearCache: true,
                    onSelect: function onSelect(suggestion) {
                        $('input[name=place_id]').val(suggestion.data);
                    }
                });
            });
        }
    }, {
        key: 'suggest',
        value: function suggest() {

            $(document).on('click', '.jq_suggest_place', function () {
                var txt = $(this).html();
                $('input[name="place"]').val(txt);
            });

            $(document).on('click', '.jq_suggest_district', function () {
                var txt = $(this).html();
                $('input[name="district"]').val(txt);
            });
        }
    }, {
        key: 'loadCities',
        value: function loadCities(stateId, cityId) {

            var result = void 0,
                element = void 0;

            if (stateId <= 0) {
                return false;
            }

            element = $('select[name="city_id"]');
            element.html('<option value="">Carregando...</option>');

            var parameters = {
                data: { state_id: stateId },
                url: '/admin/ajax/city/active/'
            };

            result = HttpService.ajax(parameters);

            result.done(function (data) {

                var selected = void 0;

                element.removeAttr('disabled');
                element.html('<option value="">Selecione a Cidade</option>');

                data.forEach(function (item) {

                    var optionCity = void 0;

                    if (cityId > 0) {

                        if (item.id == cityId) {
                            selected = true;
                        } else {
                            selected = false;
                        }

                        optionCity = $('<option>').val(item.id).text(item.name).attr("selected", selected);
                    } else {

                        optionCity = $('<option>').val(item.id).text(item.name);
                    }

                    element.append(optionCity);
                });
            });

            result.fail(function () {
                //alert('Houve um erro ao carregar Cidades do servidor!');
            });
        }
    }, {
        key: 'fillData',
        value: function fillData(data) {

            if (typeof data.cep == 'undefined') {

                $('input[name="district"]').val('');
                $('input[name="place"]').val('');
                $('input[name="numeral"]').val('');
                $('input[name="complement"]').val('');
                $('.suggest').addClass('hide');

                return false;
            }

            if (typeof data.bairro !== 'undefined' && data.bairro !== null) {

                if (data.bairro) {

                    $('.jq_suggest_district').closest('.suggest').removeClass('hide');

                    $('.jq_suggest_district').text(data.bairro);
                }
            }

            if (typeof data.logradouro !== 'undefined' && data.logradouro !== null) {

                if (data.logradouro) {

                    $('.jq_suggest_place').closest('.suggest').removeClass('hide');

                    $('.jq_suggest_place').text(data.logradouro);
                }
            }

            if (typeof data.city !== 'undefined' && data.city.id > 0) {

                $('input[name="city_id"]').val(data.city.name);
                $('select[name="state_id"]').find('option[value="' + data.state.id + '"]').attr("selected", "selected");

                CompanyAddressService.loadCities(data.state.id, data.city.id);
            }
        }
    }, {
        key: 'cities',
        value: function cities() {

            $('select[name="state_id"]').bind('change', function () {

                var result = void 0,
                    stateId = void 0,
                    element = void 0;

                stateId = $(this).val();
                if (stateId <= 0) {
                    return false;
                }

                element = $('select[name="city_id"]');
                element.html('<option value="">Carregando...</option>');

                var parameters = {
                    data: { state_id: stateId },
                    url: '/admin/ajax/city/active/'
                };

                result = HttpService.ajax(parameters);

                result.done(function (data) {

                    element.removeAttr('disabled');
                    element.html('<option value="">Selecione a Cidade</option>');

                    data.forEach(function (item) {
                        var optionCity = void 0;
                        optionCity = $('<option>').val(item.id).text(item.name);
                        element.append(optionCity);
                    });
                });

                result.fail(function () {
                    //alert('Houve um erro ao carregar Cidades do servidor!');
                });
            });
        }
    }, {
        key: 'checkZipCode',
        value: function checkZipCode() {

            $('input[name=zipcode_id]').on('keyup', function () {

                var number = $(this).val().replace(/[^0-9]/g, '').toString();

                if (number.length >= 8) {

                    $('.jq_address').removeAttr("disabled");

                    var parameters = {
                        data: { number: number },
                        url: '/admin/ajax/address/check/zipcode/'
                    };

                    var response = HttpService.ajax(parameters);

                    response.done(function (data) {
                        CompanyAddressService.fillData(data);
                    });

                    // response.fail(() => {
                    //     //alert('Houve um erro na solicitação do pedido!');
                    //     //location.reload();
                    // });
                }
            });
        }
    }]);

    return CompanyAddressService;
}();
//# sourceMappingURL=CompanyAddressService.js.map