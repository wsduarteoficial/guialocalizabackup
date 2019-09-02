class ClientCheckEmailService {

    static ckeckEmailExists() {

        $(document).on('blur', 'input[name="email_primary"]', function () {

            let email = $(this).val();

            if(ValidateHelper.validateEmail( email ) ) {
                ClientCheckEmailService._checkData( email );
            }

        });

        $(document).on('blur', 'input[name="email_secondary"]', function () {

            let email = $(this).val();

            if(ValidateHelper.validateEmail( email ) ) {
                ClientCheckEmailService._checkData( email );
            }

        });

    }

    static _checkData(email, element) {

        let cpf_cnpj = $('input[name="cpf_cnpj"]')
                        .val()
                        .replace(/[^0-9]/g, '').toString();

        let parameters = {
            data: {
                email,
                cpf_cnpj
            },
            url: '/admin/ajax/client/check/email/'
        };

        let response = HttpService.ajax(parameters);

        response.done((res) => {
            if(res.id > 0 ) {
                ClientCheckEmailService.boxSwal(element, res.company_name, res.cpf_cnpj)
            }
        });

        response.fail(() => {
            //alert('Houve um erro na solicitação do pedido, tente novamente!');
            //location.reload();
        });

    }

    static boxSwal(element, nameCompany, cpf_cnpj) {

        swal({

            title: `Endereço de email já está em uso por: <br /><span style='color:red'><strong>${nameCompany}.</strong></span>`,
            text: `CPF/CNPJ <strong>${cpf_cnpj}</strong>`,
            type: "warning",
            html: true,

            confirmButtonClass: "btn-success",
            confirmButtonText: "OK ???",
            closeOnConfirm: true,
            closeOnCancel: false

        },
        function (isConfirm) {

            if (!isConfirm) {

                element.val('');

                swal({
                    html: true,
                    title: "Cancelado!",
                    text: `Cadastro de email cancelado com sucesso.`,
                    type: "success"
                });

            }

        });

    }

}
