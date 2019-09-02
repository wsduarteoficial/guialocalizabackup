@php
$disabled = 'disabled="disabled"';
if(! empty($company->email) && validate_is_email( $company->email )) {
    $disabled = "";
}
@endphp

<div class="row">       
    <a id="contact"></a>
    <div class="conversation__head boxed boxed--lg bg--primary">
        <h4>Fale Conosco</h4>
        <span>Para entrar em contato com {{ $company->name_fantasy}}, preecha o formulário abaixo.</span>
    </div>
    <div class="conversation__reply boxed boxed--border">
        <form name="contact-company" action="#" method="post">

            {{ csrf_field() }}

            <div class="row">

                <div class="col-xs-12">
                    <input type="text" name="name" data-js="name" placeholder="Seu Nome" {{ $disabled }}>
                </div>


                <div class="col-xs-12">
                    <input type="email" name="email" data-js="email" placeholder="Seu Email" {{ $disabled }}>
                </div>

                <div class="col-xs-12">
                    <input type="text" name="email_subject" data-js="email_subject" placeholder="Assunto" {{ $disabled }}>
                </div>

                <div class="col-xs-12">
                    <textarea rows="5" name="email_message" data-js="email_message"  placeholder="Mensagem" {{ $disabled }}></textarea>
                </div>

                <div class="col-sm-4">
                    <button type="submit" data-js="send-message" class="btn" {{ $disabled }}>Enviar</button>
                </div>
                
            </div>
            
            <input type="hidden" name="aspam" data-js="anti-spam" value="true" />
            <input type="hidden" name="company_id" value="{{ $company->id }}" {{ $disabled }}>
            <input type="hidden" name="address_send" value="{{ base64_encode( $company->email ) }}" {{ $disabled }}>
            

        </form>
    </div>
</div>
