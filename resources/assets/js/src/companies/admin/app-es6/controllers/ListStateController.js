class ListStateController {

    constructor() {
		this.service = new ListStateService();
	}

	init() {

		$('#toggle-one').bootstrapToggle();

		$(function() {
			this.service.updateStatus('.jq_status_state');

			/*Loading*/
			$('#loading').hide();
			$('#sample_1').removeClass('hide');
			
		}.bind(this));

	}
	
}