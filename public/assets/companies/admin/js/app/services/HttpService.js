'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var HttpService = function () {
    function HttpService() {
        _classCallCheck(this, HttpService);
    }

    _createClass(HttpService, null, [{
        key: 'ajax',
        value: function ajax(parameters) {

            return $.ajax({
                type: parameters.type ? parameters.type : "GET",
                data: parameters.data ? parameters.data : false,
                url: parameters.url ? parameters.url : false,
                dataType: parameters.dataType ? parameters.dataType : 'json',
                contentType: parameters.contentType ? parameters.contentType : 'application/json',
                crossDomain: parameters.crossDomain ? parameters.crossDomain : true,
                cache: parameters.cache ? parameters.cache : false
            });
        }
    }]);

    return HttpService;
}();
//# sourceMappingURL=HttpService.js.map