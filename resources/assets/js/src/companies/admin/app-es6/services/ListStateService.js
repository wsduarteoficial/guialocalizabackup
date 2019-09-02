class ListStateService {

    updateStatus(element) {

        $(element).on('change', function () {

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
                                    .addClass('color_status');

                            } else {

                                elemStatus.val(0).parents('tr')
                                    .removeClass('color_status');
                            }

                            dataTo = {
                                id: elemStatus.data('id'),
                                active: elemStatus.val()
                            };

                            parameters = {
                                data: dataTo,
                                url: '/admin/ajax/state/update/status/'
                            };  

                            response = HttpService.ajax(parameters);

                            response.done((data) => {

                                if (data.active <= 0) {
                                    toastr["info"]("Estado foi desativado com sucesso!");
                                } else {
                                    toastr["success"]("Estado foi ativado com sucesso!");
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
