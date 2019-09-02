class CompanyAddressService {

    static autoCompleteDistrict(cityId='') {

        let destrict = $('input[name=district]');

        $(destrict).on('keydown', function() {

            let cityId = $("select[name=city_id] option:selected" ).val();

            $(destrict).autocomplete({
                minChars: 2,
                maxHeight: 200,
                serviceUrl: '/admin/ajax/district/city/all/',
                params: { 'city_id' : cityId },
                clearCache: true,
                onSelect: function (suggestion) {
                    $('input[name=district_id').val(suggestion.data);
                }
            });

        });

    }

    static autoCompletePlace() {

        let place = $('input[name=place]');

        $(place).on('keydown', function() {

            let cityId = $("select[name=city_id] option:selected" ).val();

            $(place).autocomplete({
                minChars: 2,
                maxHeight: 200,
                serviceUrl: '/admin/ajax/place/city/all/',
                params: { 'city_id' : cityId },
                clearCache: true,
                onSelect: function (suggestion) {
                    $('input[name=place_id]').val(suggestion.data);
                }
            });

        });

    }

    static suggest() {

        $(document).on('click', '.jq_suggest_place', function() {
            let txt = $(this).html();
            $('input[name="place"]').val(txt);
        });

        $(document).on('click', '.jq_suggest_district', function() {
            let txt = $(this).html();
            $('input[name="district"]').val(txt);
        });

    }

    static loadCities(stateId, cityId) {

        let result, element;

        if (stateId <= 0) {
            return false;
        }

        element = $('select[name="city_id"]');
        element.html('<option value="">Carregando...</option>');

        let parameters = {
            data: {state_id: stateId},
            url: '/admin/ajax/city/active/'
        };

        result = HttpService.ajax(parameters);

        result.done((data) => {

            let selected;

            element.removeAttr('disabled');
            element.html('<option value="">Selecione a Cidade</option>');

            data.forEach((item) => {

                let optionCity;

                if(cityId > 0) {

                    if(item.id == cityId) {
                        selected = true;
                    } else {
                        selected = false;
                    }

                    optionCity = $('<option>')
                            .val(item.id)
                            .text(item.name)
                            .attr("selected", selected);

                } else {

                    optionCity = $('<option>')
                            .val( item.id )
                            .text( item.name );


                }

                element.append(optionCity);

            });

        });

        result.fail(() => {
            //alert('Houve um erro ao carregar Cidades do servidor!');
        });

    }

    static fillData(data) {

        if (typeof data.cep == 'undefined') {

            $('input[name="district"]').val('');
            $('input[name="place"]').val('');
            $('input[name="numeral"]').val('');
            $('input[name="complement"]').val('');
            $('.suggest').addClass('hide');

            return false;
        }

        if (typeof data.bairro !== 'undefined'
            && data.bairro !== null) {

            if (data.bairro) {

                $('.jq_suggest_district')
                    .closest('.suggest')
                    .removeClass('hide');

                 $('.jq_suggest_district').text(data.bairro);

            }


        }

        if (typeof data.logradouro !== 'undefined'
            && data.logradouro !== null) {

            if (data.logradouro) {

                $('.jq_suggest_place')
                    .closest('.suggest')
                    .removeClass('hide');

                $('.jq_suggest_place').text(data.logradouro);

            }

        }

        if (typeof data.city !== 'undefined' && data.city.id > 0) {

            $('input[name="city_id"]').val(data.city.name);
            $('select[name="state_id"]').find(`option[value="${data.state.id}"]`).attr("selected", "selected");

            CompanyAddressService.loadCities(data.state.id, data.city.id);

        }

    }

    static cities() {

        $('select[name="state_id"]').bind('change', function () {

            let result, stateId, element;

            stateId = $(this).val();
            if (stateId <= 0) {
                return false;
            }

            element = $('select[name="city_id"]');
            element.html('<option value="">Carregando...</option>');

            let parameters = {
                data: {state_id: stateId},
                url: '/admin/ajax/city/active/'
            };

            result = HttpService.ajax(parameters);

            result.done((data) => {

                element.removeAttr('disabled');
                element.html('<option value="">Selecione a Cidade</option>');

                data.forEach((item) => {
                    let optionCity;
                    optionCity = $('<option>').val(item.id).text(item.name);
                    element.append(optionCity);
                });

            });

            result.fail(() => {
                //alert('Houve um erro ao carregar Cidades do servidor!');
            });

        });

    }

    static checkZipCode() {

        $('input[name=zipcode_id]').on('keyup', function() {

            let number = $(this).val().replace(/[^0-9]/g, '').toString();

            if (number.length >= 8) {

                $('.jq_address').removeAttr("disabled");

                let parameters = {
                    data: { number: number},
                    url: '/admin/ajax/address/check/zipcode/'
                };

                let response = HttpService.ajax(parameters);

                response.done((data) => {
                    CompanyAddressService.fillData(data);
                });

                // response.fail(() => {
                //     //alert('Houve um erro na solicitação do pedido!');
                //     //location.reload();
                // });

            }

        });

    }

}
