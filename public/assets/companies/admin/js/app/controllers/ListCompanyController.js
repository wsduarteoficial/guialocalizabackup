'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var ListCompanyController = function () {
    function ListCompanyController() {
        _classCallCheck(this, ListCompanyController);

        this.service = new ListCompanyService();
    }

    _createClass(ListCompanyController, [{
        key: 'init',
        value: function init() {

            $('#toggle-one').bootstrapToggle();

            $(function () {

                this.service.changeColorElementTr('.jq_change_status_company');
                this.service.companyUpdateStatus('.jq_change_status_company');
                this.service.companyRemove('.jq_remove_company');

                $('#jq_custom_search').bind('click', function () {

                    ComboCategoryView.categories(this.service.categoriesActive());
                    ComboPlanView.plans(this.service.plansActive());
                    ComboStateView.states(this.service.statesActive());
                    ComboCityView.cities();
                }.bind(this));

                this.service.companyFormSearch('#jq_form_search');
            }.bind(this));
        }
    }]);

    return ListCompanyController;
}();
//# sourceMappingURL=ListCompanyController.js.map