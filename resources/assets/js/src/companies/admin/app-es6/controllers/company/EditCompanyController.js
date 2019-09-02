class EditCompanyController extends BaseCompanyController {

	constructor() {
        super();
        this.service = new EditCompanyService();
        this.view = new EditCompanyView();
    }

	checkPhone() {
        super.checkPhone();
	}

	changeCategory(){
        super.changeCategory();
	}

	maskPhone() {
		if($.mask) {
			$('input[name="phone_cell[]"]').mask('(99) 9-9999-9999');
			$('input[name="phone_fixed[]"]').mask('(99) 9999-9999');
		}
        super.maskPhone();
	}

	countCharactersSEO() {
        super.countCharactersSEO();
	}

	focusZipcode() {
		super.focusZipcode();
	}

	openModalRegister() {
		super.openModalRegister('#modal-register-district');
		super.openModalRegister('#modal-register-place');
	}

	submitModal() {
		super.submitModal('form[name=create-register-district]');
		super.submitModal('form[name=create-register-place]');
	}

	_loadStateCity() {
		ComboStateView.states_company_edit();
		ComboCityView.cities_edit_company();
	}

	_typeRedirect(value='') {
		$('input[name="type_redirect"]').attr('value', value);
	}

	_removePhone() {
		$('.jq_input_phone_cell_remove_db, .jq_input_phone_fixed_remove_db, .jq_input_phone_others_remove_db').on('click', function() {
			PhoneService.removeItem( $(this) );
		});
	}

	_removePhotoGallery() {
		$('.jq_remove_photo_gallery').on('click', function() {
			GalleryService.removeItem( $(this).data('id') );
		});
	}

	_controlClassHidePlan(plan_id) {

		if( plan_id > 1 ) {
			$('#info-sponsors-01, #info-sponsors-02, #info-sponsors-03').removeClass('hide');
			$('.jq_data_required').attr('required', true);
		} else {
			$('#info-sponsors-01, #info-sponsors-02, #info-sponsors-03').addClass('hide');
			$('.jq_data_required').attr('required', false);
		}

		$('#note-info').addClass('hide');

	}

	_checkFillDistrictIsSuggest() {
		return super.checkFillDistrictIsSuggest();
	}

	_checkFillPlaceIsSuggest() {
		return super.checkFillPlaceIsSuggest();
	}

	_controlDisabled() {

		$('#subcategory_id').removeAttr('disabled');
		$('input[name=district]').removeAttr('disabled');
		$('input[name=place]').removeAttr('disabled');
		$('input[name=numeral]').removeAttr('disabled');
		$('input[name=complement]').removeAttr('disabled');

	}

	_sendForm() {

		$('#save_continue').on('click', () => {
			this._typeRedirect('save_continue');
		});

		$('#only_save').on('click', () => {
			this._typeRedirect('only_save');
		});

		$('#save_add_new').on('click', () => {
			this._typeRedirect('save_add_new');
		});

		$('form[name="edit-company"]').on('submit', function(e){

			if(! this._checkFillDistrictIsSuggest() ) {
				e.preventDefault();
				return false;
			}

			if(! this._checkFillPlaceIsSuggest() ) {
				e.preventDefault();
				return false;
			}

		}.bind(this));

	}

    init() {

        $(function () {

            CompanyRemoveService.removeCompanyEdit();
            CompanyUpdateStatusService.updateStatusEdit();

			let plan_id = $('meta[name="plan_id"]').attr("content");
			this._controlClassHidePlan(plan_id);
			ComboPlanView.companies_plans( this.service.plansActive(), plan_id );

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

}
