declare let $:any,alert: Function;

export class ContactService {

    static sendMail(dataForm : any) {

        $('[data-js="send-message"]')
            .text('Enviando...')
            .attr('disabled', true);

        $.post( "/contact/sendmail", dataForm)
        .done(function( data : Array<string> ) {

            $('[data-js="name"]').val('').attr('disabled', true);
            $('[data-js="email"]').val('').attr('disabled', true);
            $('[data-js="subject"]').val('').attr('disabled', true);
            $('[data-js="message"]').val('').attr('disabled', true);

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
