'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var AbstractCompanyController = function () {
	function AbstractCompanyController() {
		_classCallCheck(this, AbstractCompanyController);
	}

	_createClass(AbstractCompanyController, [{
		key: '_checkPhone',
		value: function _checkPhone() {

			CheckRegisteredPhone.fixed();
			CheckRegisteredPhone.cell();
		}
	}, {
		key: '_changeCategory',
		value: function _changeCategory() {
			//jq_disabled

			$(document).on('click', '.dropdown-toggle', function () {
				$('.jq_disabled').hide();
			});

			$(document).on('change', 'select[name="category_id"]', function () {

				var categoryId = $(this).val();

				categoryId = parseInt(categoryId);

				if (categoryId > 0) {

					$('.jq_disabled').hide();
					ComboSubcategoryView.subcategories(categoryId);
				} else {
					$('.jq_disabled').show();
				}
			});
		}
	}, {
		key: '_maskPhone',
		value: function _maskPhone() {
			$(document).on('click', 'body', function () {
				if ($.mask) {
					$('input[name="phone_cell[]"]').mask('(99) 9-9999-9999');
					$('input[name="phone_fixed[]"]').mask('(99) 9999-9999');
				}
			});
		}
	}, {
		key: '_countCharactersSEO',
		value: function _countCharactersSEO() {

			$('#id_title').keyup(function () {
				CharacterCountHelper.count($(this), 60, 70, $('#titleCont'));
			});

			$('#id_description').keyup(function () {
				CharacterCountHelper.count($(this), 150, 160, $('#descCont'));
			});

			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({ scrollTop: $(this.hash).offset().top }, 800);
			});
		}
	}]);

	return AbstractCompanyController;
}();
//# sourceMappingURL=AbstractCompanyController.js.map