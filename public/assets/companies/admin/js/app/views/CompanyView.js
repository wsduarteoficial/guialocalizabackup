'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var CompanyView = function () {
	function CompanyView() {
		_classCallCheck(this, CompanyView);
	}

	_createClass(CompanyView, [{
		key: 'selectPlan',
		value: function selectPlan() {

			$(document).on('change', 'select[name="plan_id"]', function () {

				$('#jq_click_alert_info').trigger('click');

				var value = void 0,
				    valueOld = void 0;
				value = $(this).val();

				if (value > 1) {

					$('.show-buttons-free').removeClass('hide');
					$('.show-buttons-sponsors').addClass('hide');
				} else if (value <= 0) {

					$('.show-buttons-free').addClass('hide');
					$('.show-buttons-sponsors').addClass('hide');
				} else {

					$('.show-buttons-free').addClass('hide');
					$('.show-buttons-sponsors').removeClass('hide');
				}

				$('#show-panels').removeClass('hide');

				$(this).parents('#pulsate-regular').remove();

				$('#plan-not-pulsate').removeClass('hide');

				if (value > 1) {

					$('#info-sponsors-01, #info-sponsors-02, #info-sponsors-03').removeClass('hide', function () {
						$(this).slideDown('slow');
					});

					$('.jq_data_required').attr('required', true);
				} else {

					$('#info-sponsors-01, #info-sponsors-02, #info-sponsors-03').addClass('hide');

					$('.jq_data_required').attr('required', false);
				}

				if (value <= 0) {

					$('#show-panels').hide();
					$('#plan-not-pulsate').show();
				} else {
					$('#show-panels').show();
				}

				$('.jq_plan_id_register').find('option[value="' + value + '"]').attr("selected", "selected");

				// valueOld = localStorage.getItem('create_company_plan_id');

				// if (valueOld) {
				// 	$('.jq_plan_id_register').find(`option[value="${valueOld}"]`).attr("selected", "selected");
				// }

				// localStorage.setItem('create_company_plan_id', value);

				if (value > 1) {
					$('#note-info').removeClass('hide');
				} else {
					$('#note-info').addClass('hide');
				}
			});
		}
	}]);

	return CompanyView;
}();
//# sourceMappingURL=CompanyView.js.map