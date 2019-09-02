class ListPlaceController {

    constructor() {
		this.service = new ListPlaceService();
	}

	init() {

		$('#toggle-one').bootstrapToggle();			

		$(function() {
				
			this.service.registerPlace('#register');
			this.service.editPlace('#edit');
			this.service.updateStatus('.jq_status_place');		 
			this.service.removePlace('.jq_remove_place');

			/*Loading*/
			$('#loading').hide();
			$('#sample_1').removeClass('hide');		 

		}.bind(this));
		
	}

	static setDataModalEdit(id, name) {
		$('#edit-place-id').val(id);
		$('#edit-place-name').val(name);
	}

}
