'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var ReportFilterController = function () {
	function ReportFilterController() {
		_classCallCheck(this, ReportFilterController);

		this.service = new ListCompanyService();
	}

	_createClass(ReportFilterController, [{
		key: 'init',
		value: function init() {

			$(function () {

				ComboPlanView.report_plans(this.service.plansActive());
				ComboStateView.report_states(this.service.statesActive());
				ComboCityView.report_cities();

				$('.jq_combo_plan').on('change', function () {
					$('.jq_combo_state').removeAttr('disabled');
					$('button[type=submit]').removeAttr('disabled');
				});

				$('.jq_combo_state').on('change', function () {
					if ($(this).val() == "") {
						$('.jq_combo_city').html('<option value="">Selecione a Cidade</option>');
					}
				});
			}.bind(this));
		}
	}]);

	return ReportFilterController;
}();
//# sourceMappingURL=ReportFilterController.js.map