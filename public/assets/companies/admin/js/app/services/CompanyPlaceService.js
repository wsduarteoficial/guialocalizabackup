'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var CompanyPlaceService = function () {
    function CompanyPlaceService() {
        _classCallCheck(this, CompanyPlaceService);
    }

    _createClass(CompanyPlaceService, null, [{
        key: 'registerData',
        value: function registerData(dataTo) {

            var parameters = {
                data: dataTo,
                url: '/admin/ajax/place/register/'
            };

            var response = HttpService.ajax(parameters);

            response.done(function (data) {

                if (data.id > 0) {
                    $('#register-place-name').val('');
                    $('input[name="place"]').val(data.name);
                    $('input[name="place_id"]').val(data.id);
                    $.alert('Endere\xE7o <span class=bold>' + data.name + '</span> inserido com sucesso!');
                }
            });
        }
    }]);

    return CompanyPlaceService;
}();

// let dataTo = {
//     'name' :
//     'city_id' : cityId
// }

// if(el === '#modal-register-district') {
//     CompanyDistrictService.registerData();
// } else {
//     CompanyPlaceService.registerData();
// }
//# sourceMappingURL=CompanyPlaceService.js.map