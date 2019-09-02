class ListUserController {

    constructor() {
		this.service = new ListUserService();
	}

	init() {

		$('#toggle-one').bootstrapToggle();

		$(function() {
			
			this.service.updateStatus('.jq_status_user');
			this.service.removeUser('.jq_remove_user');			

			/*Loading*/
			$('#loading').hide();
			$('#sample_1').removeClass('hide');
			
		}.bind(this));

	}
	
}