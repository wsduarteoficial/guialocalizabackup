class CompanyUpdateStatusService {

    static updateStatusEdit() {

        $(document).on('change', '.jq_change_status_company', function () {

            let textContent,
                elemStatus,
                typeStatus,
                dataTo,
                parameters,
                response;

            elemStatus = $(this);

            if (elemStatus.is(":checked")) {
                typeStatus = 'ON';
            } else {
                typeStatus = 'OFF';
            }

            textContent = `Tem certeza que deseja mudar o status para <strong>${typeStatus}</strong>
                em <strong>${elemStatus.data('name')}</strong>?`;

            $.confirm({
                icon: 'fa fa-info-circle',
                type: 'dark',
                typeAnimated: true,
                title: 'Confirmação!',
                content: textContent,
                buttons: {
                    cancel: {
                        text: 'Cancelar',
                        keys: ['esc'],
                        action: function () {
                            $.alert('Cancelado!');
                            location.reload();
                        }

                    },

                    confirm: {
                        text: 'Confirmar',
                        btnClass: 'btn-blue',
                        keys: ['enter'],
                        action: function () {

                            if (elemStatus.is(":checked")) {
                                elemStatus.val(1).parents('tr')
                                    .removeClass('item_inative').hide(4000);

                            } else {

                                elemStatus.val(0).parents('tr')
                                    .addClass('item_inative').hide(4000);
                            }


                            dataTo = {
                                id: elemStatus.data('id'),
                                active: elemStatus.val()
                            };

                            parameters = {
                                data: dataTo,
                                url: '/admin/ajax/company/update/status/active/'
                            };

                            response = HttpService.ajax(parameters);

                            response.done((data) => {

                                if (data.active <= 0) {
                                    toastr["info"]("Empresa foi removida do índice de pesquisa.", "ATENÇÃO!");
                                    location.href =  elemStatus.data('url-redirect');

                                } else {
                                    toastr["success"]("Empresa incluída no índice de pesquisa com sucesso!");
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
