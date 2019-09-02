class ComboSubcategoryView {

    static subcategories(categoryId) {

        let result, element;

        element = $('#subcategory_id');
        element.html('<option value="loading">Carregando...</option>');

        result = ListSubcategoryService.subcategoriesActive(categoryId);

        result.done((data) => {

            $("#subcategory_id option[value='loading']").remove();
            element.removeAttr('disabled');
            element.prop('required', true);

            if (data.length > 1) {
                element.html('<option value="">Selecione a Subcategoria</option>');
            }           

            data.forEach((item) => {
                let option;
                option = $('<option>').val(item.id).text(item.name);
                element.append(option);
                //element.html(option);
            });

        });

        result.always(function(data) {
            if(data.length <= 0) {
                element.prop('disabled', true);
                element.html('<option value="">Não possui subcategorias cadastradas.</option>');
            }
        });

        result.fail(() => {
            //alert('Houve um erro ao carregar Cidades do servidor!');
        });

    }

}
