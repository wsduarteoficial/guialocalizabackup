'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var ComboCategoryView = function () {
    function ComboCategoryView() {
        _classCallCheck(this, ComboCategoryView);
    }

    _createClass(ComboCategoryView, null, [{
        key: 'categories',
        value: function categories(result) {

            var element = void 0,
                selected = void 0,
                categoryId = void 0,
                optionCategory = void 0;

            element = $('select[name="category"]');
            categoryId = $.urlParam('category');

            result.done(function (data) {

                element.removeAttr('disabled');
                element.html('<option value="">Categorias</option>');

                data.forEach(function (item) {

                    if (categoryId > 0) {

                        if (item.id == categoryId) {
                            selected = true;
                        } else {
                            selected = false;
                        }

                        optionCategory = $('<option>').val(item.id).text(item.name).attr("selected", selected);
                    } else {

                        optionCategory = $('<option>').val(item.id).text(item.name);
                    }

                    element.append(optionCategory);
                });
            });

            result.fail(function () {
                //alert('Houve um erro ao carregar Categorias do servidor!');
            });
        }
    }]);

    return ComboCategoryView;
}();
//# sourceMappingURL=ComboCategoryView.js.map