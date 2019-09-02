class CompanyDistrictService {
    
    static registerData(dataTo) {
    
        let parameters = {
            data: dataTo,
            url: '/admin/ajax/district/register/'
        };

        let response = HttpService.ajax(parameters);

        response.done((data) => { 
            if(data.id > 0) {
                $('#register-district-name').val('');
                $('input[name="district"]').val(data.name);
                $('input[name="district_id"]').val(data.id);
                $.alert(`Bairro <span class=bold>${data.name}</span> inserido com sucesso!`);
            }
        });

    }

}
    