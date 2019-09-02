'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var CompanyFormSearchService = function () {
    function CompanyFormSearchService() {
        _classCallCheck(this, CompanyFormSearchService);
    }

    _createClass(CompanyFormSearchService, [{
        key: 'search',
        value: function search(element) {

            var search = $.urlParam('name_fantasy');
            var active = $.urlParam('active');
            var numberPhone = $.urlParam('numberPhone');
            var phone = $.urlParam('phone');
            var plan = $.urlParam('plan');

            if (search) {
                $('input[type=search]').val(search.replace(/\+/g, ' '));
            }

            $('input:radio[name=active]').removeAttr('checked');
            $('#active-' + active).prop("checked", true);

            if (numberPhone) {
                $('input[name=numberPhone]').val(numberPhone.replace(/\+/g, ' '));
            }

            $('input:radio[name=phone]').removeAttr('checked');
            $('#phone-' + phone).prop("checked", true);
        }
    }]);

    return CompanyFormSearchService;
}();
//# sourceMappingURL=companyFormSearchService.js.map