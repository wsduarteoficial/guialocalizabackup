class CompanyFormSearchService {

    static search(element) {

        let search = $.urlParam('name_fantasy');
        let active = $.urlParam('active');
        let numberPhone = $.urlParam('numberPhone');
        let phone = $.urlParam('phone');
        let plan = $.urlParam('plan');

        if (search) {
            $('input[type=search]').val(search.replace(/\+/g,' '));
        }

        $('input:radio[name=active]').removeAttr('checked');
        $(`#active-${active}`).prop("checked", true);

        if (numberPhone) {
            $('input[name=numberPhone]').val( numberPhone.replace(/\+/g,' ') );
        }

        $('input:radio[name=phone]').removeAttr('checked');
        $(`#phone-${phone}`).prop("checked", true);

    }

}
