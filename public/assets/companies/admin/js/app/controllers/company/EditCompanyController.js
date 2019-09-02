'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _get = function get(object, property, receiver) { if (object === null) object = Function.prototype; var desc = Object.getOwnPropertyDescriptor(object, property); if (desc === undefined) { var parent = Object.getPrototypeOf(object); if (parent === null) { return undefined; } else { return get(parent, property, receiver); } } else if ("value" in desc) { return desc.value; } else { var getter = desc.get; if (getter === undefined) { return undefined; } return getter.call(receiver); } };

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var EditCompanyController = function (_BaseCompanyControlle) {
	_inherits(EditCompanyController, _BaseCompanyControlle);

	function EditCompanyController() {
		_classCallCheck(this, EditCompanyController);

		var _this = _possibleConstructorReturn(this, (EditCompanyController.__proto__ || Object.getPrototypeOf(EditCompanyController)).call(this));

		_this.service = new EditCompanyService();
		_this.view = new EditCompanyView();
		return _this;
	}

	_createClass(EditCompanyController, [{
		key: 'checkPhone',
		value: function checkPhone() {
			_get(EditCompanyController.prototype.__proto__ || Object.getPrototypeOf(EditCompanyController.prototype), 'checkPhone', this).call(this);
		}
	}, {
		key: 'changeCategory',
		value: function changeCategory() {
			_get(EditCompanyController.prototype.__proto__ || Object.getPrototypeOf(EditCompanyController.prototype), 'changeCategory', this).call(this);
		}
	}, {
		key: 'maskPhone',
		value: function maskPhone() {
			if ($.mask) {
				$('input[name="phone_cell[]"]').mask('(99) 9-9999-9999');
				$('input[name="phone_fixed[]"]').mask('(99) 9999-9999');
			}
			_get(EditCompanyController.prototype.__proto__ || Object.getPrototypeOf(EditCompanyController.prototype), 'maskPhone', this).call(this);
		}
	}, {
		key: 'countCharactersSEO',
		value: function countCharactersSEO() {
			_get(EditCompanyController.prototype.__proto__ || Object.getPrototypeOf(EditCompanyController.prototype), 'countCharactersSEO', this).call(this);
		}
	}, {
		key: 'focusZipcode',
		value: function focusZipcode() {
			_get(EditCompanyController.prototype.__proto__ || Object.getPrototypeOf(EditCompanyController.prototype), 'focusZipcode', this).call(this);
		}
	}, {
		key: 'openModalRegister',
		value: function openModalRegister() {
			_get(EditCompanyController.prototype.__proto__ || Object.getPrototypeOf(EditCompanyController.prototype), 'openModalRegister', this).call(this, '#modal-register-district');
			_get(EditCompanyController.prototype.__proto__ || Object.getPrototypeOf(EditCompanyController.prototype), 'openModalRegister', this).call(this, '#modal-register-place');
		}
	}, {
		key: 'submitModal',
		value: function submitModal() {
			_get(EditCompanyController.prototype.__proto__ || Object.getPrototypeOf(EditCompanyController.prototype), 'submitModal', this).call(this, 'form[name=create-register-district]');
			_get(EditCompanyController.prototype.__proto__ || Object.getPrototypeOf(EditCompanyController.prototype), 'submitModal', this).call(this, 'form[name=create-register-place]');
		}
	}, {
		key: '_loadStateCity',
		value: function _loadStateCity() {
			ComboStateView.states_company_edit();
			ComboCityView.cities_edit_company();
		}
	}, {
		key: '_typeRedirect',
		value: function _typeRedirect() {
			var value = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';

			$('input[name="type_redirect"]').attr('value', value);
		}
	}, {
		key: '_removePhone',
		value: function _removePhone() {
			$('.jq_input_phone_cell_remove_db, .jq_input_phone_fixed_remove_db, .jq_input_phone_others_remove_db').on('click', function () {
				PhoneService.removeItem($(this));
			});
		}
	}, {
		key: '_removePhotoGallery',
		value: function _removePhotoGallery() {
			$('.jq_remove_photo_gallery').on('click', function () {
				GalleryService.removeItem($(this).data('id'));
			});
		}
	}, {
		key: '_controlClassHidePlan',
		value: function _controlClassHidePlan(plan_id) {

			if (plan_id > 1) {
				$('#info-sponsors-01, #info-sponsors-02, #info-sponsors-03').removeClass('hide');
				$('.jq_data_required').attr('required', true);
			} else {
				$('#info-sponsors-01, #info-sponsors-02, #info-sponsors-03').addClass('hide');
				$('.jq_data_required').attr('required', false);
			}

			$('#note-info').addClass('hide');
		}
	}, {
		key: '_checkFillDistrictIsSuggest',
		value: function _checkFillDistrictIsSuggest() {
			return _get(EditCompanyController.prototype.__proto__ || Object.getPrototypeOf(EditCompanyController.prototype), 'checkFillDistrictIsSuggest', this).call(this);
		}
	}, {
		key: '_checkFillPlaceIsSuggest',
		value: function _checkFillPlaceIsSuggest() {
			return _get(EditCompanyController.prototype.__proto__ || Object.getPrototypeOf(EditCompanyController.prototype), 'checkFillPlaceIsSuggest', this).call(this);
		}
	}, {
		key: '_controlDisabled',
		value: function _controlDisabled() {

			$('#subcategory_id').removeAttr('disabled');
			$('input[name=district]').removeAttr('disabled');
			$('input[name=place]').removeAttr('disabled');
			$('input[name=numeral]').removeAttr('disabled');
			$('input[name=complement]').removeAttr('disabled');
		}
	}, {
		key: '_sendForm',
		value: function _sendForm() {
			var _this2 = this;

			$('#save_continue').on('click', function () {
				_this2._typeRedirect('save_continue');
			});

			$('#only_save').on('click', function () {
				_this2._typeRedirect('only_save');
			});

			$('#save_add_new').on('click', function () {
				_this2._typeRedirect('save_add_new');
			});

			$('form[name="edit-company"]').on('submit', function (e) {

				if (!this._checkFillDistrictIsSuggest()) {
					e.preventDefault();
					return false;
				}

				if (!this._checkFillPlaceIsSuggest()) {
					e.preventDefault();
					return false;
				}
			}.bind(this));
		}
	}, {
		key: 'init',
		value: function init() {

			$(function () {

				CompanyRemoveService.removeCompanyEdit();
				CompanyUpdateStatusService.updateStatusEdit();

				var plan_id = $('meta[name="plan_id"]').attr("content");
				this._controlClassHidePlan(plan_id);
				ComboPlanView.companies_plans(this.service.plansActive(), plan_id);

				this.view.selectPlan();
				this.view.addInputPhoneFixed('.jq_input_phone_fixed_add');
				this.view.addInputPhoneCell('.jq_input_phone_cell_add');
				this.view.addInputPhoneOthers('.jq_input_phone_others_add');

				//fnc private
				this.checkPhone();
				this.changeCategory();
				this.maskPhone();
				this.countCharactersSEO();
				this.openModalRegister();
				this.focusZipcode();
				this.submitModal();

				this._sendForm();
				this._removePhone();
				this._removePhotoGallery();
				this._loadStateCity();
				this._controlDisabled();

				ClientService.checkIsExistsCpfCnpj();
				ClientCheckEmailService.ckeckEmailExists();

				CompanyAddressService.checkZipCode();
				CompanyAddressService.cities();
				CompanyAddressService.suggest();
				CompanyAddressService.autoCompleteDistrict();
				CompanyAddressService.autoCompletePlace();
			}.bind(this));
		}
	}]);

	return EditCompanyController;
}(BaseCompanyController);
//# sourceMappingURL=EditCompanyController.js.map