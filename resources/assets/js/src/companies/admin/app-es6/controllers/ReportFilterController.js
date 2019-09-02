class ReportFilterController {

	constructor() {
		this.service = new ListCompanyService();
	}

	init() {

		$(function() {

			ComboPlanView.report_plans( this.service.plansActive() );
			ComboStateView.report_states( this.service.statesActive() );
			ComboCityView.report_cities();

			$('.jq_combo_plan').on('change', function() {
				$('.jq_combo_state').removeAttr('disabled');
				$('button[type=submit]').removeAttr('disabled');
			});

			$('.jq_combo_state').on('change', function() {
				if ($(this).val() =="") {
					$('.jq_combo_city').html('<option value="">Selecione a Cidade</option>');
				}
			});

		}.bind(this));

	}

}
