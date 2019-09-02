class ListPageService {

    updateStatus(element) {

        $(element).on('change', function () {

            let elemStatus = $(this);
            ListPageService._changeStatus(elemStatus);

        });
    }

    static changeStatusDocument(document) {

        ListPageService._changeStatus(document);
    }

    static _changeStatus(elemStatus) {

        let textContent,
            typeStatus,
            dataTo,
            parameters,
            response;

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
                            url: '/admin/ajax/page/update/status/'
                        };

                        response = HttpService.ajax(parameters);

                        response.done((data) => {

                            if (data.active <= 0) {
                                toastr["info"]("Página foi desativada com sucesso!");
                            } else {
                                toastr["success"]("Página foi ativada com sucesso!");
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
    }

    removePage(element) {

        $(element).on('click', function() {

            let textContent,
            element_html,
            page_name,
            page_id,
            dataTo,
            parameters,
            response;

            element_html = $(this);
            page_id = $(this).data('id');
            page_name = $(this).data('name');

            textContent = `Tem certeza que deseja remover a página <strong>${page_name}</strong> permanentemente?`;

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
                        }

                    },

                    confirm: {
                        text: 'Confirmar',
                        btnClass: 'btn-blue',
                        keys: ['enter'],
                        action: function () {

                            element_html.parents('tr')
                            .addClass('item_inative').hide(4000);

                            dataTo = {
                                id: page_id,
                            };

                            parameters = {
                                data: dataTo,
                                url: '/admin/ajax/page/remove/'
                            };

                            response = HttpService.ajax(parameters);

                            response.done((data) => {

                                if (data) {
                                    toastr["success"]("Página foi excluída com sucesso!");
                                } else {
                                    //alert('Houve um erro na solicitação do pedido!');
                                    location.reload();
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
