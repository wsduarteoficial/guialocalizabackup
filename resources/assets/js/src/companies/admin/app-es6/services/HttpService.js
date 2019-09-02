class HttpService {

    static ajax(parameters) {

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

}