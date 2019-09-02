'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var SuggestService = function () {
    function SuggestService() {
        _classCallCheck(this, SuggestService);
    }

    _createClass(SuggestService, null, [{
        key: 'categories',
        value: function categories() {

            $('#suggest-category').autocomplete({
                minChars: 1,
                maxHeight: 200,
                serviceUrl: '/admin/ajax/suggests/categories',
                onSelect: function onSelect(suggestion) {
                    $('#category_id').val(suggestion.id);
                }
            });
        }
    }]);

    return SuggestService;
}();
//# sourceMappingURL=SuggestService.js.map