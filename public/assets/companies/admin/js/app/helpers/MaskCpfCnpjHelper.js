"use strict";

$(".cpf_cnpj").keypress(function () {
    var texto = $(".cpf_cnpj").val();

    if (texto != "") {
        var tamanho = $(".cpf_cnpj").val().length;
        if (tamanho == 14) {
            $(".cpf_cnpj").unmask();
        } else {
            $(".cpf_cnpj").unmask();
        }
    }
});
//# sourceMappingURL=MaskCpfCnpjHelper.js.map