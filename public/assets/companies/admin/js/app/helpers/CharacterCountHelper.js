'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var CharacterCountHelper = function () {
    function CharacterCountHelper() {
        _classCallCheck(this, CharacterCountHelper);
    }

    _createClass(CharacterCountHelper, null, [{
        key: 'count',


        /* Conta caracteres do input obj e monta texto para exibir no #tituloCont. */
        value: function count(obj, warning, error, destino) {

            var len = obj.val().length;

            if (len === 0) {
                $(destino).html('0 caracteres');
            } else if (len === 1) {
                $(destino).html('1 caracter');
            } else {
                $(destino).html(len + ' caracteres');
            }

            if (len > warning && len <= error) {
                $(destino).addClass('text-warning').removeClass('font-red-mint');
            } else if (len > error) {
                $(destino).addClass('font-red-mint').removeClass('text-warning');
            } else {
                $(destino).removeClass('font-red-mint text-warning');
            }
        }
    }]);

    return CharacterCountHelper;
}();
//# sourceMappingURL=CharacterCountHelper.js.map