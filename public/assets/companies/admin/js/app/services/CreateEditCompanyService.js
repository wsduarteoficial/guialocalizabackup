'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var CreateCompanyService = function () {
    function CreateCompanyService() {
        _classCallCheck(this, CreateCompanyService);
    }

    _createClass(CreateCompanyService, [{
        key: 'plansActive',
        value: function plansActive() {
            var parameters = void 0;
            parameters = {
                url: '/admin/ajax/plan/active/'
            };
            return HttpService.ajax(parameters);
        }
    }, {
        key: 'categoriesActive',
        value: function categoriesActive() {
            var parameters = void 0;
            parameters = {
                url: '/admin/ajax/category/active/'
            };
            return HttpService.ajax(parameters);
        }
    }]);

    return CreateCompanyService;
}();
//# sourceMappingURL=CreateEditCompanyService.js.map