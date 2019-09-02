export class RegisterDataCityService {

    register(el:string) {

        $(el).bind('change', function () {              

            if ($(this).find(':selected').data('state') <= 0) {
                return;
            }

            let stateId: any;
            let cityId: any;

            stateId = $(this).find(':selected').data('state');
            cityId = $(this).val();

            $('input[name="state"]').val(stateId);
            $('input[name="city"]').val(cityId);

            localStorage.setItem('phoneCityId', cityId);
            localStorage.setItem('phoneStateId', stateId);
            
        });

    }

}
