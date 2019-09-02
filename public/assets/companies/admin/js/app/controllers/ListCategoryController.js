'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var ListCategoryController = function () {
	function ListCategoryController() {
		_classCallCheck(this, ListCategoryController);

		this.service = new ListCategoryService();
	}

	_createClass(ListCategoryController, [{
		key: 'init',
		value: function init() {

			$(function () {

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
	}], [{
		key: 'setDataModalRegisterSubcategory',
		value: function setDataModalRegisterSubcategory(id, name) {

			$('#register-category-id').val(id);
			$('.jq_category_name').text(name);
		}
	}, {
		key: 'setDataModalEditCategory',
		value: function setDataModalEditCategory(id, name) {

			$('#edit-category-id').val(id);
			$('#edit-category-name').val(name);
		}
	}, {
		key: 'setDataModalEditSubcategory',
		value: function setDataModalEditSubcategory(id, name, categoryId, categoryName) {

			$('#edit-subcategory-id').val(id);
			$('#edit-subcategory-name').val(name);
			$('#edit-category-id-per-subcategory').val(categoryId);
			$('.jq_category_name').text(categoryName);
		}
	}]);

	return ListCategoryController;
}();
//# sourceMappingURL=ListCategoryController.js.map