class SuggestService {

    static categories() {
      
        $('#suggest-category').autocomplete({
            minChars: 1,
            maxHeight: 200,
            serviceUrl: '/admin/ajax/suggests/categories',
            onSelect: function (suggestion) {          
                $('#category_id').val(suggestion.id);                        
            }
        });

    }

}
