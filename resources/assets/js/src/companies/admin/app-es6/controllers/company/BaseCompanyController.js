class BaseCompanyController {

    checkPhone() {

        CheckRegisteredPhone.fixed();
        CheckRegisteredPhone.cell();

    }

    changeCategory(){
        //jq_disabled

        $(document).on('click', '.dropdown-toggle', function() {
            $('.jq_disabled').hide();
        });

        $(document).on('change', 'select[name="category_id"]', function() {

            let categoryId = $(this).val();

            categoryId = parseInt(categoryId);

            if(categoryId > 0) {

                $('.jq_disabled').hide();
                ComboSubcategoryView.subcategories( categoryId );

            } else {
                $('.jq_disabled').show();
            }

        });

    }

    maskPhone() {
        $(document).on('click', 'body', function() {
            if($.mask) {
                $('input[name="phone_cell[]"]').mask('(99) 9-9999-9999');
                $('input[name="phone_fixed[]"]').mask('(99) 9999-9999');
            }
        });
    }

    countCharactersSEO() {

        $('#id_title').keyup(function() {
            CharacterCountHelper.count($(this), 60, 70, $('#titleCont'));
        });

        $('#id_description').keyup(function() {
            CharacterCountHelper.count($(this), 310, 320, $('#descCont'));
        });

        $(".scroll").click(function(event){
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top}, 800);
        });

    }

    openModalRegister(el) {

        $(el).on('click', function() {

            let stateName = $("select[name=state_id] option:selected").text();
            let cityName  = $("select[name=city_id] option:selected").text();
            let cityId = $('select[name=city_id]').find('option:selected').val();

            if (parseInt( cityId ) > 0) {

                $('.text-register-city').html(`<span class="bold">${ stateName } / ${ cityName }</span>`);
                $('.hidden-register-city-id').val( cityId );
                $('.jq_disabled').removeAttr('disabled');

            } else {
                $('.text-register-city').html(`<span class="bold">Informe o CEP no Formulário</span>`);
                $('.jq_disabled').attr('disabled', true);
            }

        });

    }

    submitModal(form) {

        $(form).on('submit', function(e){

            e.preventDefault();

            let dataTo = $( this ).serialize();

            if(form === 'form[name=create-register-district]') {
                CompanyDistrictService.registerData( dataTo );
            } else if(form === 'form[name=create-register-place]') {
                CompanyPlaceService.registerData( dataTo );
            }

            return false;

        });

    }

    focusZipcode() {

        $(document).on('click', '.btn-outline', function(){
            $('#id_zipcode').focus();
        });

    }

    checkFillDistrictIsSuggest() {

        let district = $('input[name="district"]').val();

        if( district.length > 0 ) {

            let district_id = $('input[name="district_id"]').val();

            if( district_id > 0 ) {
                return true;
            }

            $.alert('Selecione o <strong>bairro</strong> corretamente na lista <br />ou cadastre um novo!');
            return false;

        }

        return true;

    }

    checkFillPlaceIsSuggest() {

        let place = $('input[name="place"]').val();

        if( place.length > 0 ) {

            let place_id = $('input[name="place_id"]').val();

            if( place_id > 0 ) {
                return true;
            }

            $.alert('Selecione o <strong>endereço</strong> corretamente na lista <br />ou cadastre um novo!');
            return false;

        }

        return true;

    }

}
