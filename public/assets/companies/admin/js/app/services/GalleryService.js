"use strict";

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var GalleryService = function () {
    function GalleryService() {
        _classCallCheck(this, GalleryService);
    }

    _createClass(GalleryService, null, [{
        key: "removeDoc",
        value: function removeDoc(data) {
            $("#gallery-photo-" + data.id).hide(1000);
        }
    }, {
        key: "boxSwal",
        value: function boxSwal(id) {

            swal({

                title: "Confirma\xE7\xE3o de remo\xE7\xE3o de foto.",
                text: "Deseja realmente remover esta foto?",
                type: "warning",
                html: true,

                showCancelButton: true,
                cancelButtonClass: "btn-danger",
                cancelButtonText: "NÃO",
                confirmButtonClass: "btn-success",
                confirmButtonText: "SIM",
                closeOnConfirm: true,
                closeOnCancel: false

            }, function (isConfirm) {

                if (isConfirm) {

                    GalleryService.removeItemDb(id);
                } else {

                    swal({
                        html: true,
                        title: "Cancelado!",
                        text: "Solicita\xE7\xE3o de remo\xE7\xE3o de foto, cancelada com sucesso.",
                        type: "success"
                    });
                }
            });
        }
    }, {
        key: "removeItem",
        value: function removeItem(id) {
            GalleryService.boxSwal(id);
        }
    }, {
        key: "removeItemDb",
        value: function removeItemDb(id) {

            var parameters = {
                data: { id: id },
                url: '/admin/ajax/gallery/photo/remove/'
            };

            var response = HttpService.ajax(parameters);

            response.done(function (data) {
                GalleryService.removeDoc(data);
            });

            response.fail(function () {
                //alert('Houve um erro na solicitação do pedido!');
                location.reload();
            });
        }
    }]);

    return GalleryService;
}();
//# sourceMappingURL=GalleryService.js.map