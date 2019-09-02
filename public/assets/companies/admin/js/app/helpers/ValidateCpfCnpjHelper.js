'use strict';

(function () {

    $('.cpf_cnpj').blur(function () {
        var cpf_cnpj = $('.cpf_cnpj').val().replace(/[^0-9]/g, '').toString();

        if (cpf_cnpj.length == 11) {
            var v = [];

            //Calcula o primeiro dígito de verificação.
            v[0] = 1 * cpf_cnpj[0] + 2 * cpf_cnpj[1] + 3 * cpf_cnpj[2];
            v[0] += 4 * cpf_cnpj[3] + 5 * cpf_cnpj[4] + 6 * cpf_cnpj[5];
            v[0] += 7 * cpf_cnpj[6] + 8 * cpf_cnpj[7] + 9 * cpf_cnpj[8];
            v[0] = v[0] % 11;
            v[0] = v[0] % 10;

            //Calcula o segundo dígito de verificação.
            v[1] = 1 * cpf_cnpj[1] + 2 * cpf_cnpj[2] + 3 * cpf_cnpj[3];
            v[1] += 4 * cpf_cnpj[4] + 5 * cpf_cnpj[5] + 6 * cpf_cnpj[6];
            v[1] += 7 * cpf_cnpj[7] + 8 * cpf_cnpj[8] + 9 * v[0];
            v[1] = v[1] % 11;
            v[1] = v[1] % 10;

            //Retorna Verdadeiro se os dígitos de verificação são os esperados.
            if (v[0] != cpf_cnpj[9] || v[1] != cpf_cnpj[10]) {
                swal("Atenção!", 'O n\xFAmero ' + cpf_cnpj + ' \xE9 um CPF inv\xE1lido!', "error");
                $('.cpf_cnpj').val('');
                $('.cpf_cnpj').focus();
            } else {
                $(".cpf_cnpj").mask("999.999.999-99");
            }
        } else if (cpf_cnpj.length == 14) {

            // Elimina CNPJs invalidos conhecidos
            if (cpf_cnpj == "00000000000000" || cpf_cnpj == "11111111111111" || cpf_cnpj == "22222222222222" || cpf_cnpj == "33333333333333" || cpf_cnpj == "44444444444444" || cpf_cnpj == "55555555555555" || cpf_cnpj == "66666666666666" || cpf_cnpj == "77777777777777" || cpf_cnpj == "88888888888888" || cpf_cnpj == "99999999999999") return false;

            // Valida DVs
            var tamanho = cpf_cnpj.length - 2;
            var numeros = cpf_cnpj.substring(0, tamanho);
            var digitos = cpf_cnpj.substring(tamanho);
            var soma = 0;
            var pos = tamanho - 7;
            for (var i = tamanho; i >= 1; i--) {
                soma += numeros.charAt(tamanho - i) * pos--;
                if (pos < 2) pos = 9;
            }
            var resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
            if (resultado != digitos.charAt(0)) return false;

            tamanho = tamanho + 1;
            numeros = cpf_cnpj.substring(0, tamanho);
            soma = 0;
            pos = tamanho - 7;
            for (var _i = tamanho; _i >= 1; _i--) {
                soma += numeros.charAt(tamanho - _i) * pos--;
                if (pos < 2) pos = 9;
            }
            resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
            if (resultado != digitos.charAt(1)) {

                swal("Atenção!", 'O n\xFAmero ' + cpf_cnpj + ' \xE9 um CNPJ inv\xE1lido!', "error");
                $('.cpf_cnpj').val('');
                $('.cpf_cnpj').focus();
            } else {
                $(".cpf_cnpj").mask("99.999.999/9999-99");
            }
        } else {
            swal("Atenção!", 'Por favor, informe um CPF ou CNPJ v\xE1lido!', "error");
            $('.cpf_cnpj').val('');
            $('.cpf_cnpj').focus();
            $(".cpf_cnpj").unmask();
        }
    });
})();
//# sourceMappingURL=ValidateCpfCnpjHelper.js.map