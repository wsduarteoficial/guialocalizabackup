'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var ListSubcategoryService = function () {
    function ListSubcategoryService() {
        _classCallCheck(this, ListSubcategoryService);
    }

    _createClass(ListSubcategoryService, null, [{
        key: 'subcategoriesActive',
        value: function subcategoriesActive(categoryId) {

            var dataTo = void 0,
                parameters = void 0;

            dataTo = {
                id: categoryId,
                active: true
            };

            parameters = {
                data: dataTo,
                url: '/admin/ajax/subcategory/filter/per/category/'
            };

            return HttpService.ajax(parameters);
        }
    }]);

    return ListSubcategoryService;
}();
//# sourceMappingURL=ListSubcategoryService.js.map