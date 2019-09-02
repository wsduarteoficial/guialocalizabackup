class GalleryService {

    static removeDoc(data) {
        $(`#gallery-photo-${ data.id }`).hide(1000);
    }

    static boxSwal(id) {

        swal({

            title: `Confirmação de remoção de foto.`,
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

        },
        function (isConfirm) {

            if (isConfirm) {

                GalleryService.removeItemDb(id);

            } else {

                swal({
                    html: true,
                    title: "Cancelado!",
                    text: `Solicitação de remoção de foto, cancelada com sucesso.`,
                    type: "success"
                });

            }

        });

    }

    static removeItem(id) {
        GalleryService.boxSwal(id)
    }

    static removeItemDb(id) {

        let parameters = {
            data: { id: id } ,
            url: '/admin/ajax/gallery/photo/remove/'
        };

        let response = HttpService.ajax(parameters);

        response.done((data) => {
            GalleryService.removeDoc(data);
        });

        response.fail(() => {
            //alert('Houve um erro na solicitação do pedido!');
            location.reload();
        });

    }

}
