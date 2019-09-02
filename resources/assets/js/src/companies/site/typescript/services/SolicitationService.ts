declare let $:any,alert: Function;

export class SolicitationService {

    static sendMail(dataForm : any) {

        $('[data-js="send-message"]')
            .text('Enviando...')
            .attr('disabled', true);

        $.post( "/solicitation/sendmail", dataForm)
            .done(function( data : Array<string> ) {

            $('[data-js="name-contact"]').val('').attr('disabled', true);
            $('[data-js="email-contact"]').val('').attr('disabled', true);
            $('[data-js="subject-contact"]').val('').attr('disabled', true);
            $('[data-js="name-fantasy"]').val('').attr('disabled', true);
            $('[data-js="description"]').val('').attr('disabled', true);
            $('[data-js="name-fantasy"]').val('').attr('disabled', true);
            $('[data-js="category"]').val('').attr('disabled', true);
            $('[data-js="phone-fixed"]').val('').attr('disabled', true);
            $('[data-js="phone-cell"]').val('').attr('disabled', true);
            $('[data-js="phone-others"]').val('').attr('disabled', true);
            $('[data-js="address"]').val('').attr('disabled', true);
            $('[data-js="number"]').val('').attr('disabled', true);
            $('[data-js="complement"]').val('').attr('disabled', true);
            $('[data-js="district"]').val('').attr('disabled', true);
            $('[data-js="cep"]').val('').attr('disabled', true);
            $('[data-js="abbr"]').val('').attr('disabled', true);
            $('[data-js="city"]').val('').attr('disabled', true);
            $('[data-js="comments"]').val('').attr('disabled', true);

            $('[data-js="send-message"]')
                .text('Mensagem Enviada!')
                .attr('disabled', true);

            $.alert({
                title: 'Atenção!',
                content: 'Sua menssagem foi enviada com sucesso!',
            });

        });

    }

}
