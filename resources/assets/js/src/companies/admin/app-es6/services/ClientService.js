class ClientService {

    static fillData(data) {

        $('input[name="company_name"').val(data.company_name);
        $('input[name="contracting_name"').val(data.contracting_name);
        $('input[name="phone"').val(data.phone);
        $('input[name="email_primary"').val(data.email_primary);
        $('input[name="email_secondary"').val(data.email_secondary);
        //$('input[name="cpf_cnpj"').val(data.cpf_cnpj);

    }

    static checkIsExistsCpfCnpj() {        

        $('input[name=cpf_cnpj]').blur(function() {

            let number = $(this).val().replace(/[^0-9]/g, '').toString();

            if (number.length >= 11) {
             
                let parameters = {
                    data: { number: number} ,
                    url: '/admin/ajax/client/check/cpf_cnpj/'
                };

                let response = HttpService.ajax(parameters);

                response.done((data) => {                    
                    ClientService.fillData(data);
                });

                response.fail(() => {
                    //alert('Houve um erro na solicitação do pedido!');
                    location.reload();
                });

            }

        });

    }

}
