if($.mask) {

    $('#id_zipcode').mask('99999-999');
    
    (function(){

        let telefone_selector = '#id_phone';
        $(telefone_selector).mask('(99) 9999-9999?9');
        $(telefone_selector).on("keyup",function() {
            let tmp = $(this).val();
            tmp = tmp.replace(/[^0-9]/g,'');
            let ddd = tmp.slice(0, 2);
            let servico_regex = new RegExp('0[0-9]00');
            let servico = servico_regex.exec(tmp.slice(0,4));
            let primeiro_numero_ddd = tmp.slice(0, 1);
            let primeiro_numero = tmp[2];
            if (tmp.length == 11 && primeiro_numero == '9') {
                $(this).unmask();
                $(this).val(tmp);
                $(this).mask("(99) 9 9999-999?9");
            }
                else if (servico && (tmp.length == 11 || tmp.length == 10)) {
                $(this).unmask();
                $(this).val(tmp);
                $(this).mask("9999-999999?9");
            }
            else if (tmp.length == 10 && (primeiro_numero_ddd == '1' || primeiro_numero_ddd == '2') && primeiro_numero == '9') {
                $(this).unmask();
                $(this).val(tmp);
                $(this).mask("(99) 9999-9999?9");
            } else if (tmp.length == 10) {
                $(this).unmask();
                $(this).val(tmp);
                $(this).mask("(99) 9999-9999?9");
            }
        }).keyup();

    })();

    (function(){
        
        $(".cpf_cnpj").keydown(function(){
            let cpf_cnpj = $(this).val().replace(/[^0-9]/g, '').toString();
            if(cpf_cnpj.length <= 1) {
                $(this).unmask();                
            }
        });
    
    })();
}