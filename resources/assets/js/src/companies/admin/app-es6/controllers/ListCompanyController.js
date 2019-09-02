class ListCompanyController {

    constructor() {
        this.service = new ListCompanyService();
    }

    init() {

        $('#toggle-one').bootstrapToggle();

        $(function () {

            this.service.changeColorElementTr('.jq_change_status_company');
            this.service.companyUpdateStatus('.jq_change_status_company');
            this.service.companyRemove('.jq_remove_company');

            $('#jq_custom_search').bind('click', function () {

                ComboCategoryView.categories( this.service.categoriesActive() );
                ComboPlanView.plans( this.service.plansActive() );
                ComboStateView.states( this.service.statesActive() );
                ComboCityView.cities();

            }.bind(this));

            this.service.companyFormSearch('#jq_form_search');

        }.bind(this));

    }

}
