class ComboCityView {

    static cities() {

        $('select[name="state"]').bind('change', function () {

            let result, stateId, element;

            stateId = $(this).val();

            if (stateId <= 0) {
                return false;
            }

            element = $('select[name="city"]');
            element.html('<option value="">Carregando...</option>');

            result = ListCompanyService.citiesActive(stateId);

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

        let stateId, cityId;

        stateId = $.urlParam('state');
        cityId = $.urlParam('city');

        if (stateId > 0 && cityId > 0) {

            if (stateId <= 0) {
                return false;
            }

            let result, selected, element;

            element = $('select[name="city"]');
            element.html('<option value="">Carregando...</option>');

            result = ListCompanyService.citiesActive(stateId);

            result.done((data) => {

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

    }

    static report_cities() {

        $('select[name="state"]').bind('change', function () {

            let result, stateId, element;

            stateId = $(this).val();

            if (stateId <= 0) {
                return false;
            }

            element = $('select[name="city"]');
            element.html('<option value="">Carregando...</option>');

            result = ListCompanyService.citiesActive(stateId);

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

    static cities_edit_company() {

        let stateId, cityId;

        stateId = $('meta[name="state_id"]').attr("content");
        cityId = $('meta[name="city_id"]').attr("content");

        if (stateId > 0 && cityId > 0) {

            if (stateId <= 0) {
                return false;
            }

            let result, selected, element;

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

    }

}
