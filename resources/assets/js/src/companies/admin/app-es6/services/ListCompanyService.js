class ListCompanyService {

    categoriesActive() {
        let parameters;
        parameters = {
            url: '/admin/ajax/category/active/'
        };
        return HttpService.ajax(parameters);
    }

    plansActive() {
        let parameters;
        parameters = {
            url: '/admin/ajax/plan/active/'
        };
        return HttpService.ajax(parameters);
    }

    statesActive() {
        let parameters;
        parameters = {
            url: '/admin/ajax/state/active/'
        };
        return HttpService.ajax(parameters);
    }

    static citiesActive(stateId) {
        let parameters;
        parameters = {
            data: {state_id: stateId},
            url: '/admin/ajax/city/active/'
        };
        return HttpService.ajax(parameters);
    }

    companyRemove(element) {

        $(element).bind('click', function () {

            let textContent,
                elemRemove,
                parameters,
                response;

            elemRemove = $(this);
            textContent = `Tem certeza que deseja enviar para a lixeira <b>${elemRemove.data('name')}</>?`;

            $.confirm({
                icon: 'fa fa-info-circle',
                type: 'red',
                typeAnimated: true,
                title: 'Confirmação de exclusão!',
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
                                    toastr["success"]("Dados enviados para a lixeira sucesso!");
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

    companyUpdateStatus(element) {

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

    changeColorElementTr(element) {

        $(element).map(function () {
            if ($(this).is(":checked")) {
                $(this).parents('tr')
                    .removeClass('item_inative');
            } else {
                $(this).parents('tr').addClass('item_inative');
            }

        });

    }

    companyFormSearch(element) {

        let search = $.urlParam('name_fantasy');
        let active = $.urlParam('active');
        let numberPhone = $.urlParam('numberPhone');
        let phone = $.urlParam('phone');
        let plan = $.urlParam('plan');

        if (search) {
            $('input[type=search]').val(search.replace(/\+/g,' '));
        }

        $('input:radio[name=active]').removeAttr('checked');
        $(`#active-${active}`).prop("checked", true);

        if (numberPhone) {
            $('input[name=numberPhone]').val( numberPhone.replace(/\+/g,' ') );
        }

        $('input:radio[name=phone]').removeAttr('checked');
        $(`#phone-${phone}`).prop("checked", true);

    }


}
