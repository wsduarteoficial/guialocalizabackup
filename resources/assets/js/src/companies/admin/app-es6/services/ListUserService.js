class ListUserService {

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
                de <strong>${elemStatus.data('name')}</strong>?`;

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
                                url: '/admin/ajax/user/update/status/'
                            };  

                            response = HttpService.ajax(parameters);

                            response.done((data) => {

                                if (data.active <= 0) {
                                    toastr["info"]("Usuário foi desativado com sucesso!");
                                } else {
                                    toastr["success"]("Usuário foi ativado com sucesso!");
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


    removeUser(element) {
        
        $(element).on('click', function() {

            let textContent,
            elemHtml,
            userName,
            userId,
            dataTo,
            parameters, 
            response;

            elemHtml = $(this);
            userId = $(this).data('id');
            userName = $(this).data('name');            

            textContent = `Tem certeza que deseja remover o Usuário <strong>${userName}</strong> permanentemente?`;

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

                            elemHtml.parents('tr')
                            .addClass('item_inative').hide(4000);

                            dataTo = {
                                id: userId,
                            };

                            parameters = {
                                data: dataTo,
                                url: '/admin/ajax/user/remove/'
                            };

                            response = HttpService.ajax(parameters);

                            response.done((data) => {

                                if (data) {
                                    toastr["success"]("O Usuário foi excluído com sucesso!");    
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
