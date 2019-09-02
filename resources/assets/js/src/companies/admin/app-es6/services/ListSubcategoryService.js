class ListSubcategoryService {

    static subcategoriesActive(categoryId) {
        
        let dataTo, parameters;

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
}
