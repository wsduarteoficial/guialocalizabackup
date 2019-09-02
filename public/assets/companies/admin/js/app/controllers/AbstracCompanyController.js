'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var CreateCompanyController = function () {
	function CreateCompanyController() {
		_classCallCheck(this, CreateCompanyController);

		this.service = new CreateCompanyService();
		this.view = new CreateCompanyView();
	}

	_createClass(CreateCompanyController, [{
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
		key: '_typeRedirect',
		value: function _typeRedirect() {
			var value = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';

			$('input[name="type_redirect"]').attr('value', value);
		}
	}, {
		key: '_sendForm',
		value: function _sendForm() {
			var _this = this;

			$('#save_continue').on('click', function () {
				_this._typeRedirect('save_continue');
			});

			$('#only_save').on('click', function () {
				_this._typeRedirect('only_save');
			});

			$('#save_add_new').on('click', function () {
				_this._typeRedirect('save_add_new');
			});

			$('form[name="create-new-company"]').on('submit', function (e) {

				// validation code here
				// CheckRegisteredPhone.outher();

				// let valid = false;
				// if(!valid) {
				//   e.preventDefault();
				// }
				// 
				// 


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
	}, {
		key: 'init',
		value: function init() {

			$('#info-sponsors-01, #info-sponsors-02, #info-sponsors-03').addClass('hide');
			$('#show-panels').addClass('hide');
			$('.show-buttons-free').addClass('hide');
			$('.show-buttons-sponsors').addClass('hide');
			$('#note-info').addClass('hide');

			$(function () {

				ComboPlanView.companies_plans(this.service.plansActive(), false);
				this.view.selectPlan();
				this.view.addInputPhoneFixed('.jq_input_phone_fixed_add');
				this.view.addInputPhoneCell('.jq_input_phone_cell_add');
				this.view.addInputPhoneOuther('.jq_input_phone_outher_add');

				//fnc private
				this._checkPhone();
				this._changeCategory();
				this._maskPhone();
				this._countCharactersSEO();
				this._sendForm();

				ClientService.checkIsExistsCpfCnpj();
				CompanyAddressService.checkZipCode();
				CompanyAddressService.cities();
				CompanyAddressService.suggest();
				CompanyAddressService.autoCompleteDistrict();
				CompanyAddressService.autoCompletePlace();
			}.bind(this));
		}
	}]);

	return CreateCompanyController;
}();
//# sourceMappingURL=AbstracCompanyController.js.map