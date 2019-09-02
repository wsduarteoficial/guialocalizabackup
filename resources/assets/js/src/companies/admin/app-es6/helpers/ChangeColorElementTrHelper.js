class ChangeColorElementTrHelper {

    changeColor(element) {

        $(element).map(function () {
            if ($(this).is(":checked")) {
                $(this).parents('tr')
                    .removeClass('item_inative');
            } else {
                $(this).parents('tr').addClass('item_inative');
            }

        });

    }

}
