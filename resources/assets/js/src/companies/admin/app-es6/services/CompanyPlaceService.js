class CompanyPlaceService {

    static registerData(dataTo) {

        let parameters = {
            data: dataTo,
            url: '/admin/ajax/place/register/'
        };

        let response = HttpService.ajax(parameters);

        response.done((data) => {

            if(data.id > 0) {
                $('#register-place-name').val('');
                $('input[name="place"]').val(data.name);
                $('input[name="place_id"]').val(data.id);
                $.alert(`Endereço <span class=bold>${data.name}</span> inserido com sucesso!`);
            }
        });

    }

}

// let dataTo = {
//     'name' :
//     'city_id' : cityId
// }

// if(el === '#modal-register-district') {
//     CompanyDistrictService.registerData();
// } else {
//     CompanyPlaceService.registerData();
// }
