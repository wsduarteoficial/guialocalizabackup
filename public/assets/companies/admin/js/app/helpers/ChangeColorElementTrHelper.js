'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var ChangeColorElementTrHelper = function () {
    function ChangeColorElementTrHelper() {
        _classCallCheck(this, ChangeColorElementTrHelper);
    }

    _createClass(ChangeColorElementTrHelper, [{
        key: 'changeColor',
        value: function changeColor(element) {

            $(element).map(function () {
                if ($(this).is(":checked")) {
                    $(this).parents('tr').removeClass('item_inative');
                } else {
                    $(this).parents('tr').addClass('item_inative');
                }
            });
        }
    }]);

    return ChangeColorElementTrHelper;
}();
//# sourceMappingURL=ChangeColorElementTrHelper.js.map