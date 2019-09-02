class CharacterCountHelper {
	
	/* Conta caracteres do input obj e monta texto para exibir no #tituloCont. */
    static count(obj, warning, error, destino) {

        let len = obj.val().length;
    
        if(len === 0) {
            $(destino).html('0 caracteres');
        } else if (len === 1) {
            $(destino).html('1 caracter');
        } else {
            $(destino).html(len + ' caracteres');
        }
    
        if(len > warning && len <= error) {	
            $(destino).addClass('text-warning').removeClass('font-red-mint');
        } else if (len > error) {
            $(destino).addClass('font-red-mint').removeClass('text-warning')
        } else {
            $(destino).removeClass('font-red-mint text-warning');
        }
        
    }

}
