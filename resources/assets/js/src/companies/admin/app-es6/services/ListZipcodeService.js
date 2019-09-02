class ListZipcodeService {

    updateStatus(element) {

        $(element).on('change', function () {

            let elemStatus = $(this);
            ListZipcodeService._changeStatus(elemStatus);

        });
    }

    static changeStatusDocument(document) {

        ListZipcodeService._changeStatus(document);
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
                            url: '/admin/ajax/zipcode/update/status/'
                        };

                        response = HttpService.ajax(parameters);

                        response.done((data) => {

                            if (data.active <= 0) {
                                toastr["info"]("CEP foi desativado com sucesso!");
                            } else {
                                toastr["success"]("CEP foi ativado com sucesso!");
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

    registerZipcode(element) {

        $(element).on('submit', function( event ) {
            
            event.preventDefault();

            let values, parameters, response;
                        
            values = $(this).serialize();           

            $('.modal-register').fadeOut('5000', function() {

                $(this).modal('hide');
                
            });

            parameters = {
                data: values,
                url: '/admin/ajax/zipcode/register/'
            };

            response = HttpService.ajax(parameters);

            response.done((data) => {
           
                if (data.id>0) {

                    ListZipcodeService._trTable(data);

                    toastr["success"]("Novo CEP cadastrado com sucesso!");
                }
                else {

                    if (data.exists===true) {
                        alert(`CEP ${data.code} já existe na base de dados!`);
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
            <td>${data.code}</td>
            <td>${data.city_state}</td>

            <td class="center">  
                <input type="checkbox" id="toogle-register" class="jq_status_zipcode" value="0" data-id="${data.id}" data-name="${data.name}" data-toggle="toggle" data-onstyle="success"> 
            </td>
          
            <td>
                <div class="btn-group">
                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Ação
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        
                        <li>                   
                            <a href="#"  data-id="${data.id}" data-name="${data.name}" onclick="ListZipcodeController.setDataModalEdit(this.getAttribute('data-id'), this.getAttribute('data-name') );"  data-target=".modal-edit" data-toggle="modal">
                                <i class="fa fa-edit"></i> Editar 
                            </a>
                        </li>

                        <li>
                            <a href="#" class="jq_remove_zipcode">
                                <i class="fa fa-times"></i> Remover </a>
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

    editZipcode(element) {

        $(element).submit(function( event ) {            
          
            event.preventDefault();

            let values, parameters, response;
            
            values = $(this).serialize();          

            $('.modal-edit').fadeOut('5000', function() {
                $(this).modal('hide');                
            });

            parameters = {
                data: values,
                url: '/admin/ajax/zipcode/edit/'
            };

            response = HttpService.ajax(parameters);

            response.done((data) => {

                if (data.zipcode_id > 0) {   

                    $(`.jq_zipcodeName_${data.zipcode_id}`).text(data.code);              
                    toastr["success"]("CEP alterado com sucesso!");

                    $.alert('Dados alterados com Sucesso. <br>Atualizando lista de registros!');

                    setInterval(() => {
                      location.reload();
                    }, 3000);
                }
                else {
                    if (data.exists===true) {
                        alert(`CEP ${data.code} já existe na base de dados!`);
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

    removeZipcode(element) {

        $(element).on('click', function() {

            let textContent,
            elementHtml,
            zipcodeName,
            zipcodeId,
            dataTo,
            parameters, 
            response;

            elementHtml = $(this);
            zipcodeId = $(this).data('id');
            zipcodeName = $(this).data('name');            

            textContent = `Tem certeza que deseja remover o CEP <strong>${zipcodeName}</strong> permanentemente?`;

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

                            elementHtml.parents('tr')
                                .addClass('item_inative').hide(4000);

                            dataTo = {
                                id: zipcodeId,
                            };

                            parameters = {
                                data: dataTo,
                                url: '/admin/ajax/zipcode/remove/'
                            };

                            response = HttpService.ajax(parameters);

                            response.done((data) => {

                                if (data) {
                                    toastr["success"]("O CEP foi excluído com sucesso!");    
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
