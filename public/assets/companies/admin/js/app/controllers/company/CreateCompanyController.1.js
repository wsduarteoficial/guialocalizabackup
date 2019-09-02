'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _get = function get(object, property, receiver) { if (object === null) object = Function.prototype; var desc = Object.getOwnPropertyDescriptor(object, property); if (desc === undefined) { var parent = Object.getPrototypeOf(object); if (parent === null) { return undefined; } else { return get(parent, property, receiver); } } else if ("value" in desc) { return desc.value; } else { var getter = desc.get; if (getter === undefined) { return undefined; } return getter.call(receiver); } };

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var CreateCompanyController = function (_AbstractCompanyContr) {
	_inherits(CreateCompanyController, _AbstractCompanyContr);

	function CreateCompanyController() {
		_classCallCheck(this, CreateCompanyController);

		var _this = _possibleConstructorReturn(this, (CreateCompanyController.__proto__ || Object.getPrototypeOf(CreateCompanyController)).call(this));

		_this.service = new CreateCompanyService();
		_this.view = new CreateCompanyView();
		return _this;
	}

	_createClass(CreateCompanyController, [{
		key: 'checkPhone',
		value: function checkPhone() {
			_get(CreateCompanyController.prototype.__proto__ || Object.getPrototypeOf(CreateCompanyController.prototype), 'checkPhone', this).call(this);
		}
	}, {
		key: 'changeCategory',
		value: function changeCategory() {
			_get(CreateCompanyController.prototype.__proto__ || Object.getPrototypeOf(CreateCompanyController.prototype), 'changeCategory', this).call(this);
		}
	}, {
		key: 'maskPhone',
		value: function maskPhone() {
			_get(CreateCompanyController.prototype.__proto__ || Object.getPrototypeOf(CreateCompanyController.prototype), 'maskPhone', this).call(this);
		}
	}, {
		key: 'countCharactersSEO',
		value: function countCharactersSEO() {
			_get(CreateCompanyController.prototype.__proto__ || Object.getPrototypeOf(CreateCompanyController.prototype), 'countCharactersSEO', this).call(this);
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
		key: 'init',
		value: function init() {

			$('#info-sponsors-01, #info-sponsors-02, #info-sponsors-03').addClass('hide');
			$('#show-panels').addClass('hide');
			$('.show-buttons-free').addClass('hide');
			$('.show-buttons-sponsors').addClass('hide');
			$('#note-info').addClass('hide');

			$(function () {

				toastr["success"]("Novo CEP cadastrado com sucesso!");

				ComboPlanView.companies_plans(this.service.plansActive(), false);
				this.view.selectPlan();
				this.view.addInputPhoneFixed('.jq_input_phone_fixed_add');
				this.view.addInputPhoneCell('.jq_input_phone_cell_add');
				this.view.addInputPhoneOuther('.jq_input_phone_outher_add');

				//fnc private
				this.checkPhone();
				this.changeCategory();
				this.maskPhone();
				this.countCharactersSEO();

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
}(AbstractCompanyController);
//# sourceMappingURL=CreateCompanyController.1.js.map