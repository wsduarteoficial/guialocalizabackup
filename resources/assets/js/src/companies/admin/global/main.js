//Escoder menu para Search
$('#search-menu').bind('click',function(event) {
    $('.jq_menu_hide_in_search').hide(300);
});

$('body').click(function (event) {
    if(event.target.id != 'search-menu'){
        $('.jq_menu_hide_in_search').show(300);
    }
});

$.urlParam = function(name){
    let results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results===null){
       return null;
    }
    else{
       return decodeURI(results[1]) || 0;
    }
}

if($.mask) {
    $('#cep, #edit-zipcode-name').mask('99999-999');
}

$('select[name="state"]').on('change', function() {
    $('select[name="city"]').html('<option value="">Carregando...</option>');
});
