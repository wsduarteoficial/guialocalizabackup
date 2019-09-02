'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var ComboSubcategoryView = function () {
    function ComboSubcategoryView() {
        _classCallCheck(this, ComboSubcategoryView);
    }

    _createClass(ComboSubcategoryView, null, [{
        key: 'subcategories',
        value: function subcategories(categoryId) {

            var result = void 0,
                element = void 0;

            element = $('#subcategory_id');
            element.html('<option value="loading">Carregando...</option>');

            result = ListSubcategoryService.subcategoriesActive(categoryId);

            result.done(function (data) {

                $("#subcategory_id option[value='loading']").remove();
                element.removeAttr('disabled');
                element.prop('required', true);

                if (data.length > 1) {

                    element.html('<option value="">Selecione a Subcategoria</option>');
                }

                data.forEach(function (item) {
                    var option = void 0;
                    option = $('<option>').val(item.id).text(item.name);
                    element.append(option);
                    //element.html(option);
                });
            });

            result.always(function (data) {
                if (data.length <= 0) {
                    element.prop('disabled', true);
                    element.html('<option value="">Não possui subcategorias cadastradas.</option>');
                }
            });

            result.fail(function () {
                //alert('Houve um erro ao carregar Cidades do servidor!');
            });
        }
    }]);

    return ComboSubcategoryView;
}();
//# sourceMappingURL=ComboSubcategoryView.js.map