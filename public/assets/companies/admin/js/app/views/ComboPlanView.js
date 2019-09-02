'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var ComboPlanView = function () {
    function ComboPlanView() {
        _classCallCheck(this, ComboPlanView);
    }

    _createClass(ComboPlanView, null, [{
        key: 'plans',
        value: function plans(result) {
            var list = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;


            var element = void 0,
                plan = void 0,
                selected = void 0;

            plan = $.urlParam('plan');

            element = $('select[name="plan"]');

            result.done(function (data) {

                element.removeAttr('disabled');

                if (list === true) {
                    element.html('<option value="">Planos</option>');
                } else {
                    element.html('<option value="0">Selecione o plano</option>');
                }

                data.forEach(function (item) {

                    var optionPlan = void 0;

                    if (plan > 0) {

                        if (item.id == plan) {
                            selected = true;
                        } else {
                            selected = false;
                        }

                        optionPlan = $('<option>').val(item.id).text(item.name).attr("selected", selected);
                    } else {

                        optionPlan = $('<option>').val(item.id).text(item.name);
                    }

                    element.append(optionPlan);
                });
            });

            result.fail(function () {
                //alert('Houve um erro ao carregar Planos do servidor!');
            });
        }
    }, {
        key: 'companies_plans',
        value: function companies_plans(result, value_selected) {

            var element = void 0,
                selected = void 0;

            element = $('select[name="plan_id"]');

            result.done(function (data) {

                element.removeAttr('disabled');

                element.html('<option value="">Selecione o plano</option>');

                data.forEach(function (item) {

                    var optionPlan = void 0;

                    if (value_selected > 0) {

                        if (item.id == value_selected) {
                            selected = true;
                        } else {
                            selected = false;
                        }

                        optionPlan = $('<option>').val(item.id).text(item.name).attr("selected", selected);
                    } else {

                        optionPlan = $('<option>').val(item.id).text(item.name);
                    }

                    element.append(optionPlan);
                });
            });

            result.fail(function () {
                //alert('Houve um erro ao carregar Planos do servidor!');
            });
        }
    }, {
        key: 'report_plans',
        value: function report_plans(result) {

            var element = void 0,
                selected = void 0;

            element = $('select[name="plan"]');

            result.done(function (data) {

                element.removeAttr('disabled');

                element.html('<option value="">Selecione o plano</option>');

                data.forEach(function (item) {

                    var optionPlan = void 0;

                    optionPlan = $('<option>').val(item.id).text(item.name);

                    element.append(optionPlan);
                });
            });

            result.fail(function () {
                //alert('Houve um erro ao carregar Planos do servidor!');
            });
        }
    }]);

    return ComboPlanView;
}();
//# sourceMappingURL=ComboPlanView.js.map