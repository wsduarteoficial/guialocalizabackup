class ListZipcodeController {

    constructor() {
		this.service = new ListZipcodeService();
	}

	init() {

		$('#toggle-one').bootstrapToggle();			

		$(function() {
				
			this.service.registerZipcode('#register');
			this.service.editZipcode('#edit');
			this.service.updateStatus('.jq_status_zipcode');		 
			this.service.removeZipcode('.jq_remove_zipcode');

			/*Loading*/
			$('#loading').hide();
			$('#sample_1').removeClass('hide');	

		}.bind(this));
		
	}

	static setDataModalEdit(id, name) {
		$('#edit-zipcode-id').val(id);
		$('#edit-zipcode-name').val(name);
	}

}
