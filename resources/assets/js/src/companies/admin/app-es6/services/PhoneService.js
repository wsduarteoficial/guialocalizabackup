class PhoneService {

    static cleanInput(el) {
        let phoneId = el.data('phone-id');
        $(`.jq_phone_number${phoneId}`).val('');
    }

    static boxSwal(el, dataTo) {

        swal({

            title: `Remover número <span style='color:red'><strong>${dataTo.number}</strong></span>`,
            text: "Deseja realmente remover este número?",
            type: "warning",
            html: true,

            showCancelButton: true,
            cancelButtonClass: "btn-danger",
            cancelButtonText: "NÃO",
            confirmButtonClass: "btn-success",
            confirmButtonText: "SIM",
            closeOnConfirm: false,
            closeOnCancel: false

        },
        function (isConfirm) {

            if (isConfirm) {

                PhoneService.remove(el, dataTo);

            } else {

                swal({
                    html: true,
                    title: "Cancelado!",
                    text: `Solicitação de remoção de telefone, cancelada com sucesso.`,
                    type: "success"
                });

            }

        });

    }

    static remove(el, dataTo) {

        let parameters = {
            data: dataTo,
            url: '/admin/ajax/phone/remove/item/'
        };

        let response = HttpService.ajax(parameters);

        response.done((data) => {

            if(data.removed === true) {

                swal({
                    html: true,
                    title: "ATENÇÃO!",
                    text: `O número <span style='color:red'><strong>${dataTo.number}</strong></span> foi removido com sucesso.`,
                    type: "success"
                });

                PhoneService.cleanInput(el);

            } else {
                toastr["error"]('Houve um erro na solicitação do pedido!');
            }

        });

        response.fail(() => {
            //alert('Houve um erro na solicitação do pedido!');
        });

    }

    static removeItem(el){

        let phoneId = el.data('phone-id');
        let number = $(`.jq_phone_number${phoneId}`).val();

        let dataTo = {
            'phone_id' : phoneId,
            'number' :  number,
            'company_id' : el.data('company-id')
        }

        PhoneService.boxSwal(el, dataTo);

    }

}
