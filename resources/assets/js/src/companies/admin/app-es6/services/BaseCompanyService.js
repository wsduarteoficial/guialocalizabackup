class BaseCompanyService {

	plansActive() {
        let parameters;
        parameters = {
            url: '/admin/ajax/plan/active/'
        };
        return HttpService.ajax(parameters);
    }

    categoriesActive() {
        let parameters;
        parameters = {
            url: '/admin/ajax/category/active/'
        };
        return HttpService.ajax(parameters);
    }

}
