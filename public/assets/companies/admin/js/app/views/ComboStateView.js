'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var ComboStateView = function () {
    function ComboStateView() {
        _classCallCheck(this, ComboStateView);
    }

    _createClass(ComboStateView, null, [{
        key: 'states',
        value: function states(result) {

            var element = void 0,
                selected = void 0,
                stateId = void 0;
            element = $('select[name="state"]');
            stateId = $.urlParam('state');

            result.done(function (data) {

                element.html('<option value="">Selecione o Estado</option>');

                data.forEach(function (item) {

                    var optionState = void 0;

                    if (stateId > 0) {

                        if (item.id == stateId) {
                            selected = true;
                        } else {
                            selected = false;
                        }

                        optionState = $('<option>').val(item.id).text(item.name).attr("selected", selected);
                    } else {

                        optionState = $('<option>').val(item.id).text(item.name);
                    }

                    element.append(optionState);
                });
            });

            result.fail(function () {
                //alert('Houve um erro ao carregar Estados do servidor!');
            });
        }
    }, {
        key: 'states_company_edit',
        value: function states_company_edit() {

            var element = void 0,
                selected = void 0,
                stateId = void 0;
            element = $('select[name="state_id"]');
            stateId = $('meta[name="state_id"]').attr("content");

            var parameters = {
                url: '/admin/ajax/state/active/'
            };

            var result = HttpService.ajax(parameters);

            element.removeAttr('disabled');

            result.done(function (data) {

                element.html('<option value="">Selecione o Estado</option>');

                data.forEach(function (item) {

                    var optionState = void 0;

                    if (stateId > 0) {

                        if (item.id == stateId) {
                            selected = true;
                        } else {
                            selected = false;
                        }

                        optionState = $('<option>').val(item.id).text(item.name).attr("selected", selected);
                    } else {

                        optionState = $('<option>').val(item.id).text(item.name);
                    }

                    element.append(optionState);
                });
            });

            result.fail(function () {
                //alert('Houve um erro ao carregar Estados do servidor!');
            });
        }
    }, {
        key: 'report_states',
        value: function report_states(result) {

            var element = void 0,
                selected = void 0,
                stateId = void 0;
            element = $('select[name="state"]');

            element.html('<option value="">Selecione o Estado</option>');

            result.done(function (data) {

                data.forEach(function (item) {

                    var optionState = void 0;

                    if (stateId > 0) {

                        if (item.id == stateId) {
                            selected = true;
                        } else {
                            selected = false;
                        }

                        optionState = $('<option>').val(item.id).text(item.name).attr("selected", selected);
                    } else {

                        optionState = $('<option>').val(item.id).text(item.name);
                    }

                    element.append(optionState);
                });
            });

            result.fail(function () {
                //alert('Houve um erro ao carregar Estados do servidor!');
            });
        }
    }]);

    return ComboStateView;
}();
//# sourceMappingURL=ComboStateView.js.map