class ListCityController {

    constructor() {
		this.service = new ListCityService();
	}

	init() {

		$('#toggle-one').bootstrapToggle();			

		$(function() {
				
			this.service.registerCity('#register');

			this.service.editCity('#edit');
			this.service.updateStatus('.jq_status_city');		 
			this.service.removeCity('.jq_remove_city');

			/*Loading*/
			$('#loading').hide();
			$('#sample_1').removeClass('hide');		 

		}.bind(this));
		
	}

	static setDataModalEdit(id, name) {
		$('#edit-city-id').val(id);
		$('#edit-city-name').val(name);
	}

}
