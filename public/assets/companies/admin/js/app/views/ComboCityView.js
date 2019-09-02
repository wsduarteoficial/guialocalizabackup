'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var ComboCityView = function () {
    function ComboCityView() {
        _classCallCheck(this, ComboCityView);
    }

    _createClass(ComboCityView, null, [{
        key: 'cities',
        value: function cities() {

            $('select[name="state"]').bind('change', function () {

                var result = void 0,
                    stateId = void 0,
                    element = void 0;

                stateId = $(this).val();

                if (stateId <= 0) {
                    return false;
                }

                element = $('select[name="city"]');
                element.html('<option value="">Carregando...</option>');

                result = ListCompanyService.citiesActive(stateId);

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

            var stateId = void 0,
                cityId = void 0;

            stateId = $.urlParam('state');
            cityId = $.urlParam('city');

            if (stateId > 0 && cityId > 0) {

                if (stateId <= 0) {
                    return false;
                }

                var result = void 0,
                    selected = void 0,
                    element = void 0;

                element = $('select[name="city"]');
                element.html('<option value="">Carregando...</option>');

                result = ListCompanyService.citiesActive(stateId);

                result.done(function (data) {

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
        }
    }, {
        key: 'report_cities',
        value: function report_cities() {

            $('select[name="state"]').bind('change', function () {

                var result = void 0,
                    stateId = void 0,
                    element = void 0;

                stateId = $(this).val();

                if (stateId <= 0) {
                    return false;
                }

                element = $('select[name="city"]');
                element.html('<option value="">Carregando...</option>');

                result = ListCompanyService.citiesActive(stateId);

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
        key: 'cities_edit_company',
        value: function cities_edit_company() {

            var stateId = void 0,
                cityId = void 0;

            stateId = $('meta[name="state_id"]').attr("content");
            cityId = $('meta[name="city_id"]').attr("content");

            if (stateId > 0 && cityId > 0) {

                if (stateId <= 0) {
                    return false;
                }

                var result = void 0,
                    selected = void 0,
                    element = void 0;

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
        }
    }]);

    return ComboCityView;
}();
//# sourceMappingURL=ComboCityView.js.map