class ListDistrictController {

    constructor() {
		this.service = new ListDistrictService();
	}

	init() {

		$('#toggle-one').bootstrapToggle();			

		$(function() {
				
			this.service.registerDistrict('#register');

			this.service.editDistrict('#edit');
			this.service.updateStatus('.jq_status_district');		 
			this.service.removeDistrict('.jq_remove_district');

			/*Loading*/
			$('#loading').hide();
			$('#sample_1').removeClass('hide');		 

		}.bind(this));
		
	}

	static setDataModalEdit(id, name) {
		$('#edit-district-id').val(id);
		$('#edit-district-name').val(name);
	}

}
