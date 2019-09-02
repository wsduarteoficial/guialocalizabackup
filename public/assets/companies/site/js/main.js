let Guialocaliza = {};

$(function() {

    $(Guialocaliza.Companies.registerCookieCity());

});


Guialocaliza.Companies = {

    changeActionForm: function(parameters) {

        let serviceSearch = parameters.serviceSearch;

        if (serviceSearch === 'phone') {
            $("#form-search-phone").attr("action", "/empresa/busca/");
        } else if (serviceSearch === 'classified') {
            $("#form-search-phone").attr("action", "/classificado/busca/");
        }

        $('select[name="service"]').find(`option[value="${serviceSearch}"]`).attr("selected", "selected");

    },


    loadingSendViewPhoneNumber: function(elem) {

        elem.html(
            `<div class="row phone">
                <div class="col-sm-12 col-xs-12">
                    <div>
                        <img src="/assets/companies/site/img/spinner.gif">
                         Carregando...
                    </div>
                </div>
            </div>`
        );

    },

}


Guialocaliza.Storage = {


    getLocalStorage: function(parameters) {
        let name = parameters.name;
        return localStorage.getItem(name);
    },

    loadLocalStorage: function() {

        let serviceSearch = Guialocaliza.Storage.getLocalStorage({ name: 'serviceSearch' });
        let phoneStateId = Guialocaliza.Storage.getLocalStorage({ name: 'phoneStateId' });
        let phoneCityId = Guialocaliza.Storage.getLocalStorage({ name: 'phoneCityId' });

        if (serviceSearch) {
            Guialocaliza.Companies.changeActionForm({ serviceSearch: serviceSearch });
        }

        //Verifica Guialocaliza.Storage.e altera option
        if (phoneStateId > 0 && phoneStateId > 0) {
            $('input[name="state"]').val(phoneStateId);
            $('select[name="city"]').find(`option[value="${phoneCityId}"]`).attr("selected", "selected");
        }

    }

}

Guialocaliza.Storage.loadLocalStorage();