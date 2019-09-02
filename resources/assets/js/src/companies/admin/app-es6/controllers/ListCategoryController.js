class ListCategoryController {

    constructor() {
		this.service = new ListCategoryService();
	}

	init() {

		$(function() {

			this.service.registerCategory('#register-category');
			this.service.registerSubcategory('#register-subcategory');
			this.service.editCategory('#edit-category');
			this.service.editSubcategory('#edit-subcategory');
			this.service.removeCategory('.jq_remove_category');
			this.service.removeSubcategory('.jq_remove_subcategory');

			/*Loading*/
			$('#loading').hide();
			$('#tree_1').removeClass('hide');

		}.bind(this));

	}

	static setDataModalRegisterSubcategory(id, name) {

		$('#register-category-id').val(id);
		$('.jq_category_name').text(name);
	}

	static setDataModalEditCategory(id, name) {

		$('#edit-category-id').val(id);
		$('#edit-category-name').val(name);
	}
		  
	static setDataModalEditSubcategory(id, name, categoryId, categoryName) {

		$('#edit-subcategory-id').val(id);
		$('#edit-subcategory-name').val(name);
		$('#edit-category-id-per-subcategory').val(categoryId);
		$('.jq_category_name').text(categoryName);
	}

}
