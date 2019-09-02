class ListPageController {

    constructor() {
		this.service = new ListPageService();
	}

	init() {

		$('#toggle-one').bootstrapToggle();

		$(function() {

			this.service.updateStatus('.jq_status_page');
			this.service.removePage('.jq_remove_page');

			/*Loading*/
			$('#loading').hide();
			$('#sample_1').removeClass('hide');

		}.bind(this));

	}

	static setDataModalEdit(id, name) {
		$('#edit-page-id').val(id);
		$('#edit-page-name').val(name);
	}

}
