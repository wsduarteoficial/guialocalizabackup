class CreateCompanyController extends BaseCompanyController {

	constructor() {
        super();
        this.service = new CreateCompanyService();
        this.view = new CreateCompanyView();        
    }

	checkPhone() {
        super.checkPhone();
	}

	changeCategory(){	
        super.changeCategory();
	}

	maskPhone() {
        super.maskPhone()
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

	_typeRedirect(value='') {
		$('input[name="type_redirect"]').attr('value', value);
	}

	_checkNumberPhoneIsEmpty() {

		let fixed  = $('#jq_phone_fixed').val();
		let cell   = $('#jq_phone_cell').val();
		let others = $('#jq_phone_others').val();

		if ((!fixed) 
			&& (!cell) 
			&& (!others)) {

			return false;		

		}

		return true;

	}

	_checkFillDistrictIsSuggest() {
		return super.checkFillDistrictIsSuggest();
	}

	_checkFillPlaceIsSuggest() {
		return super.checkFillPlaceIsSuggest();
	}

	_controlClassHidePlan() {		
		
        $('#info-sponsors-01, #info-sponsors-02, #info-sponsors-03').addClass('hide');
        $('#show-panels').addClass('hide');
        $('.show-buttons-free').addClass('hide');
        $('.show-buttons-sponsors').addClass('hide');
		$('#note-info').addClass('hide');

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

		$('form[name="create-new-company"]').on('submit', function(e){

			let valid = this._checkNumberPhoneIsEmpty();
			if(!valid) {
				e.preventDefault();
				$('select[name="plan_id"]').focus();				
				$.alert('Por favor, informe um telefone válido!');
				return false;		
			}
			
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
		
		this._controlClassHidePlan();

        $(function () {			

            ComboPlanView.companies_plans( this.service.plansActive(), false );
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
			
			ClientService.checkIsExistsCpfCnpj();
			CompanyAddressService.checkZipCode();
			CompanyAddressService.cities();
			CompanyAddressService.suggest();
			CompanyAddressService.autoCompleteDistrict();		
			CompanyAddressService.autoCompletePlace();
			
			this._sendForm();


		}.bind(this));

    }

}
