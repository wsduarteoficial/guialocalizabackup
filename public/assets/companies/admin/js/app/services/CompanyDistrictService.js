'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var CompanyDistrictService = function () {
    function CompanyDistrictService() {
        _classCallCheck(this, CompanyDistrictService);
    }

    _createClass(CompanyDistrictService, null, [{
        key: 'registerData',
        value: function registerData(dataTo) {

            var parameters = {
                data: dataTo,
                url: '/admin/ajax/district/register/'
            };

            var response = HttpService.ajax(parameters);

            response.done(function (data) {
                if (data.id > 0) {
                    $('#register-district-name').val('');
                    $('input[name="district"]').val(data.name);
                    $('input[name="district_id"]').val(data.id);
                    $.alert('Bairro <span class=bold>' + data.name + '</span> inserido com sucesso!');
                }
            });
        }
    }]);

    return CompanyDistrictService;
}();
//# sourceMappingURL=CompanyDistrictService.js.map