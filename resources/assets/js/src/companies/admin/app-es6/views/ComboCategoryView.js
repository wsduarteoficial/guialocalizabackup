class ComboCategoryView {

    static categories(result) {

        let element, selected, categoryId, optionCategory;

        element = $('select[name="category"]');
        categoryId = $.urlParam('category');

        result.done((data) => {

            element.removeAttr('disabled');
            element.html('<option value="">Categorias</option>');

            data.forEach((item) => {

                if(categoryId > 0) {

                    if(item.id == categoryId) {
                        selected = true;
                    } else {
                        selected = false;
                    }

                    optionCategory = $('<option>')
                            .val(item.id)
                            .text(item.name)
                            .attr("selected", selected);

                } else {

                    optionCategory = $('<option>')
                            .val( item.id )
                            .text( item.name );

                }

                element.append(optionCategory);

            });

        });

        result.fail(() => {
            //alert('Houve um erro ao carregar Categorias do servidor!');
        });

    }

}
