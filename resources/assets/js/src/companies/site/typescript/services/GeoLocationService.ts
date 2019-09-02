class GeoLocationService {

    // geoLocation() {

    //     if (navigator.geolocation) {
    
    //         //Chave
    //         //AIzaSyAdqeHgWcU0mYhb1c-FkY2H_fVL1cdpiJg
    //         /**
    //          * Pegando a GEO Localização
    //          */
    //         navigator.geolocation.getCurrentPosition(function (pos) {
    
    //             //https://developers.google.com/maps/documentation/geocoding/start?hl=pt-br
    //             $.ajax({
    //                 type: "GET",
    //                 url: 'https://maps.googleapis.com/maps/api/geocode/json?latlng='+pos.coords.latitude+','+pos.coords.longitude+'&key=AIzaSyAdqeHgWcU0mYhb1c-FkY2H_fVL1cdpiJg',
    //                 //url: 'https://maps.googleapis.com/maps/api/geocode/json?latlng=-14.411339199999,-56.4491003&key=AIzaSyAdqeHgWcU0mYhb1c-FkY2H_fVL1cdpiJg',
    //                 dataType: 'json',
    //                 headers : {
    //                     'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'
    //                 },
    //                 contentType: 'application/json',
    //                 crossDomain: true,
    //                 cache: false,
    //                 success: function (data) {
    
    //                     if (data.results.length <=0 ) {
    //                         return;
    //                     }
    
    //                     data.results.forEach(function (res, index) {
    //                         if (index === 0) {
    //                             res.address_components.forEach(function (address, index) {
    //                                 console.log(address.long_name + "  -  "+ index);
    //                             });
    //                         }
    //                     });
    
    //                 },
    //                 error: function (jqXHR, textStatus, errorThrown) {
    //                     alert('Erro ao carregar dados do pedido!');
    //                     console.log(errorThrown);
    //                 }
    //             });
    
    //         }, function (pos) {
    //             alert(pos.message);
    //         });
    
    //         //pegando a posição atual para apps, a cada 5m
    //         // let mapa = navigator.geolocation.watchPosition(function (pos) {
    //         //     console.log(pos.coords.latitude +" - "+ pos.coords.longitude);
    //         // };
    //         //
    //         // navigator.geolocation.clearWatch(mapa);
    
    //     } else {
    //         alert('Sem GeoLocation');
    //     }
    // }

}


