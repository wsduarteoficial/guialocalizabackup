class ListCategoryService {

    registerCategory(element) {

        $(element).on('submit', function( event ) {
            
            event.preventDefault();

            let values, parameters, response;
                        
            values = $(this).serialize();       

            $('.modal-register-category').fadeOut('5000', function() {

                $(this).modal('hide');
                
            });

            parameters = {
                data: values,
                url: '/admin/ajax/category/register/'
            };

            response = HttpService.ajax(parameters);

            response.done((data) => {

                if (data.exists === true) {
                    
                    alert(`A categoria ${data.name}, já existe na base de dados!`);
                    $('#value-category-name').val('');                    

                } else if (data.id>0) {

                    alert('Nova categoria cadastrada com sucesso!');
                    location.reload();

                }
                else {
                    //alert('Houve um erro na solicitação do pedido!');
                    location.reload();
                }

            });

            response.fail(() => {
                //alert('Houve um erro na solicitação do pedido!');
                location.reload();
            });    

        });

    }


    editCategory(element) {

        $(element).on('submit', function( event ) {
            
            event.preventDefault();

            let values, parameters, response;
                        
            values = $(this).serialize();       

            $('.modal-edit-category').fadeOut('5000', function() {

                $(this).modal('hide');
                
            });

            parameters = {
                data: values,
                url: '/admin/ajax/category/update/'
            };

            response = HttpService.ajax(parameters);

            response.done((data) => {

                if (data.exists === true) {
                    
                    alert(`A categoria ${data.name}, já existe na base de dados!`);
                    $('#value-category-name').val('');                    

                } else if (data.category_id>0) {
                    alert('Categoria alterada com sucesso!');
                    location.reload();
                }
                else {
                    //alert('Houve um erro na solicitação do pedido!');
                    location.reload();
                }

            });

            response.fail(() => {
                //alert('Houve um erro na solicitação do pedido!');
                location.reload();
            });    

        });

    }

    editSubcategory(element) {

        $(element).on('submit', function( event ) {
            
            event.preventDefault();

            let values, parameters, response;
                        
            values = $(this).serialize();       

            $('.modal-edit-subcategory').fadeOut('5000', function() {

                $(this).modal('hide');
                
            });

            parameters = {
                data: values,
                url: '/admin/ajax/subcategory/update/'
            };

            response = HttpService.ajax(parameters);

            response.done((data) => {

                if (data.exists === true) {
                    
                    alert(`A subcategoria ${data.name}, já existe na base de dados!`);
                    $('#value-subcategory-name').val('');

                } else if (data.subcategory_id>0) {
                    alert('Subcategoria alterada com sucesso!');
                    location.reload();
                }
                else {
                    //alert('Houve um erro na solicitação do pedido!');
                    location.reload();
                }

            });

            response.fail(() => {
                //alert('Houve um erro na solicitação do pedido!');
                location.reload();
            });    

        });

    }

    
    registerSubcategory(element) {

        $(element).on('submit', function( event ) {
            
            event.preventDefault();

            let values, parameters, response;
                        
            values = $(this).serialize();       

            $('.modal-register-subcategory').fadeOut('5000', function() {

                $(this).modal('hide');
                
            });

            parameters = {
                data: values,
                url: '/admin/ajax/subcategory/register/'
            };

            response = HttpService.ajax(parameters);

            response.done((data) => {

                if (data.exists === true) {
                    
                    alert(`A subcategoria ${data.name}, já existe na base de dados!`);
                    $('#value-subcategory-name').val('');

                } else if (data.id>0) {
                    alert('Nova subcategoria cadastrada com sucesso!');
                    location.reload();
                }
                else {
                    //alert('Houve um erro na solicitação do pedido!');
                    location.reload();
                }

            });

            response.fail(() => {
                //alert('Houve um erro na solicitação do pedido!');
                location.reload();
            });    

        });

    }

    removeCategory(element) {

        $(element).on('click', function() {

            let textContent,
            elemHtml,
            category_name,
            categoryId,
            dataTo,
            parameters,
            txtAlert, 
            response;

            elemHtml = $(this);
            categoryId = $(this).data('id');

            category_name = $(this).data('name');            

            textContent = `Tem certeza que deseja remover a categoria <strong>${category_name}</strong> permanentemente?`;

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
             

                            dataTo = {
                                id: categoryId,
                            };

                            parameters = {
                                data: dataTo,
                                url: '/admin/ajax/category/remove/'
                            };

                            response = HttpService.ajax(parameters);

                            response.done((data) => {

                                if (data.exists === true) {

                                    if(data.total <= 1){

                                        txtAlert = `Solicitação Negada! Existe ${data.total} empresa cadastrada nesta categoria!`;

                                        toastr["warning"](txtAlert);         
                                        $.alert(txtAlert); 

                                    } else {

                                        txtAlert = `Solicitação Negada! Existem ${data.total} empresas cadastradas nesta categoria!`;

                                        toastr["warning"](txtAlert);         
                                        $.alert(txtAlert); 

                                    }
                                   
                                } else if (data.id) {
                                    toastr["success"]("Categoria foi excluída com sucesso!");
                                    elemHtml.parents('li').hide(3000);

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

    removeSubcategory(element) {

        $(document).on('click', '.jq_remove_subcategory', function() {

            let textContent,
            elemHtml,
            subCategoryName,
            subCategoryId,
            dataTo,
            parameters,
            txtAlert, 
            response;

            elemHtml = $(this);
            subCategoryId = $(this).data('id');

            subCategoryName = $(this).data('name');            

            textContent = `Tem certeza que deseja remover a subcategoria <strong>${subCategoryName}</strong> permanentemente?`;

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
             

                            dataTo = {
                                id: subCategoryId,
                            };

                            parameters = {
                                data: dataTo,
                                url: '/admin/ajax/subcategory/remove/'
                            };

                            response = HttpService.ajax(parameters);

                            response.done((data) => {

                                if (data.exists === true) {

                                    if(data.total <= 1){

                                        txtAlert = `Solicitação Negada! Existe ${data.total} empresa cadastrada nesta subcategoria!`;

                                        toastr["warning"](txtAlert);         
                                        $.alert(txtAlert); 

                                    } else {

                                        txtAlert = `Solicitação Negada! Existem ${data.total} empresas cadastradas nesta subcategoria!`;

                                        toastr["warning"](txtAlert);         
                                        $.alert(txtAlert); 

                                    }
                                   
                                } else if (data.id) {
                                    toastr["success"]("Subcategoria foi excluída com sucesso!");
                                    elemHtml.parents('[data-jstree]').hide(3000);

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
