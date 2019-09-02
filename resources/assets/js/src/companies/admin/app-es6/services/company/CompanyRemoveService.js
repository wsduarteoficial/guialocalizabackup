class CompanyRemoveService {

    static removeCompanyEdit() {

        $(document).on('click', '.jq_remove_company', function () {

            let textContent,
                elemRemove,
                parameters,
                response;

            elemRemove = $(this);
            textContent = `Tem certeza que deseja remover permanentemente <b>${elemRemove.data('name')}</>?`;

            $.confirm({
                icon: 'fa fa-info-circle',
                type: 'red',
                typeAnimated: true,
                title: 'Confirmação de Remoção!',
                content: textContent,
                buttons: {
                    cancel: {

                        text: 'Cancelar',
                        keys: ['esc'],
                        action: function () {
                            $.alert('Cancelado!');
                        }

                    },
                    confirm: {

                        text: 'Confirmar',
                        btnClass: 'btn-blue',
                        keys: ['enter'],
                        action: function () {

                            elemRemove.parents('tr')
                                .addClass('item_inative').hide(4000);

                            parameters = {
                                data:  {
                                    id: elemRemove.data('id')
                                },
                                url: '/admin/ajax/company/remove/'
                            };

                            response = HttpService.ajax(parameters);

                            response.done((data) => {

                                if (data.success === true) {
                                    toastr["success"]("Dados removidos com sucesso!");

                                    location.href =  elemRemove.data('url-redirect');

                                } else {
                                    toastr["info"]("Houve um erro na solicitação do pedido!", "ATENÇÃO!");
                                }

                            });

                            response.fail(() => {
                                //alert('Houve um erro na solicitação do pedido!');
                                location.reload();
                            });

                        }

                    }

                }

            });

        });

    }

}
