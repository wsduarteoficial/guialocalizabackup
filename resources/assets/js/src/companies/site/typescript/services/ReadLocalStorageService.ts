export class ReadLocalStorageService {

    private static _changeActionForm(serviceSearch: string) {
        
        if (serviceSearch === 'phone') {
            $("#form-search-phone").attr("action", "/empresa/busca/");
        } else if (serviceSearch === 'classified') {
            $("#form-search-phone").attr("action", "/classificado/busca/");
        }

        $('select[name="service"]').find(`option[value="${serviceSearch}"]`).attr("selected", "selected");

    }

    public static comboCity() {
         
        let serviceSearch: any;
        let phoneStateId: any;
        let phoneCityId: any;

        serviceSearch = localStorage.getItem('serviceSearch');
        phoneStateId = localStorage.getItem('phoneStateId');
        phoneCityId = localStorage.getItem('phoneCityId');

        if (serviceSearch) {
            ReadLocalStorageService._changeActionForm(serviceSearch);
        }

        // Change option
        if (phoneStateId > 0 && phoneStateId > 0) {
            $('input[name="state"]').val(phoneStateId);
            $('select[name="city"]')
                .find(`option[value="${phoneCityId}"]`)
                .attr("selected", "selected");
        }

    }

}
