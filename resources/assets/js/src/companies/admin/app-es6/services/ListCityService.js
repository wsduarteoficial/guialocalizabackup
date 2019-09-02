class ListCityService {

    updateStatus(element) {

        $(element).on('change', function () {

            let elemStatus = $(this);
            ListCityService._changeStatus(elemStatus);

        });
    }

    static changeStatusDocument(document) {

        ListCityService._changeStatus(document);
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
                            url: '/admin/ajax/city/update/status/'
                        };

                        response = HttpService.ajax(parameters);

                        response.done((data) => {

                            if (data.active <= 0) {
                                toastr["info"]("Cidade foi desativada com sucesso!");
                            } else {
                                toastr["success"]("Cidade foi ativada com sucesso!");
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

    registerCity(element) {

        $(element).on('submit', function( event ) {
            
            event.preventDefault();

            let values, parameters, response;
                        
            values = $(this).serialize();           

            $('.modal-register').fadeOut('5000', function() {
                $(this).modal('hide');
            });

            parameters = {
                data: values,
                url: '/admin/ajax/city/register/'
            };

            response = HttpService.ajax(parameters);

            response.done((data) => {

                if (data.exists === true) {
                    
                    alert(`A cidade ${data.name}, já existe na base de dados!`);
                    $('#value-city-name').val('');

                } else if (data.id>0) {

                    ListCityService._trTable(data);

                    toastr["success"]("Nova cidade cadastrada com sucesso!");
                }
                else {
                    if (data.exists===true) {
                        alert(`Cidade ${data.name} já existe na base de dados!`);
                    } else {
                        //alert('Houve um erro na solicitação do pedido!');
                        location.reload();

                    }
                }

            });

            response.fail(() => {
                //alert('Houve um erro na solicitação do pedido!');
                location.reload();
            });    

        });

    }

    static _trTable(data) {

        let html;

        html = `
            <tr class="odd gradeX color_status">
            <td>${data.id}</td>
            <td>${data.name}</td>
            <td>${data.name_state}</td>

            <td class="center">  
                <input type="checkbox" id="toogle-register" class="jq_status_city" value="0" data-id="${data.id}" data-name="${data.name}" data-toggle="toggle" data-onstyle="success"> 
            </td>
          
            <td>
                <div class="btn-group">
                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Ação
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        
                        <li>                   
                            <a href="#"  data-id="${data.id}" data-name="${data.name}" onclick="ListCityController.setDataModalEdit(this.getAttribute('data-id'), this.getAttribute('data-name') );"  data-target=".modal-edit" data-toggle="modal">
                                <i class="fa fa-edit"></i> Editar 
                            </a>
                        </li>

                        <li>
                            <a href="#" class="jq_remove_city">
                                <i class="fa fa-times"></i> Remover </a>
                        </li>
                        
                        <li>
                            <a href="javascript:;">
                                <i class="fa fa-circle"></i> Ver Bairros </a>
                        </li>

                        <li>
                            <a href="javascript:;">
                                <i class="fa fa-circle"></i> Ver CEPs </a>
                        </li>

                        <li>
                            <a href="javascript:;">
                                <i class="fa fa-circle"></i> Ver Logradouros </a>
                        </li>                        

                    </ul>
                </div>
            </td>

        </tr>`;
      

        $(".appendedContainer").prepend(html);
        $('#toogle-register').bootstrapToggle();
        $.alert('Dados cadastrados com Sucesso. <br>Atualizando lista de registros!');

        setInterval(() => {
          location.reload();
        }, 3000);
               

    }

    editCity(element) {

        $(element).submit(function( event ) {            
          
            event.preventDefault();

            let values, parameters, response;
            
            values = $(this).serialize();          

            $('.modal-edit').fadeOut('5000', function() {
                $(this).modal('hide');                
            });           

            parameters = {
                data: values,
                url: '/admin/ajax/city/edit/'
            };

            response = HttpService.ajax(parameters);

            response.done((data) => {

                if (data.city_id > 0) { 
                                
                    $(`.jq_city_name_${data.city_id}`).text(data.name);              
                  
                    toastr["success"]("Cidade alterada com sucesso!");

                    $.alert('Dados alterados com Sucesso. <br>Atualizando lista de registros!');

                    setInterval(() => {
                      location.reload();
                    }, 3000);

                }
                else {
                    if (data.exists===true) {
                        alert(`Cidade ${data.name} já existe na base de dados!`);
                    } else {
                        //alert('Houve um erro na solicitação do pedido!');
                        location.reload();

                    }
                }

            });

            response.fail(() => {
                //alert('Houve um erro na solicitação do pedido!');
                location.reload();
            });

        });

    }

    removeCity(element) {

        $(element).on('click', function() {

            let textContent,
            element_html,
            city_name,
            city_id,
            dataTo,
            parameters, 
            response;

            element_html = $(this);
            city_id = $(this).data('id');
            city_name = $(this).data('name');            

            textContent = `Tem certeza que deseja remover a cidade <strong>${city_name}</strong> permanentemente?`;

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
                                id: city_id,
                            };

                            parameters = {
                                data: dataTo,
                                url: '/admin/ajax/city/remove/'
                            };

                            response = HttpService.ajax(parameters);

                            response.done((data) => {

                                if (data) {
                                    toastr["success"]("Cidade foi excluída com sucesso!");    
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
