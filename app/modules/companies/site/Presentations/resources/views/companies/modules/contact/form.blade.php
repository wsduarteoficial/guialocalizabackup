<div class="col-sm-6">

    <div class="row switchable__text">

        <h2>Fale Conosco</h2>
        <p class="lead">

        Entre em contato a qualquer momento, pelo formulário abaixo, nós nos esforçamos para responder a todas as perguntas dentro de 24 horas nos dias úteis.
        </p>

        <hr class="short">
        <div class="row">
            <form name="contact" action="#" method="post">

                {{ csrf_field() }}

                <div class="col-sm-12">
                    <label>Seu Nome Completo:</label>
                    <input type="text" name="name" data-js="name" required="required" />
                </div>

                <div class="col-sm-12">
                    <label>Seu e-mail:</label>
                    <input type="email" name="email" data-js="email" required="required" />
                </div>

                <div class="col-sm-12">
                    <label>Assunto:</label>
                    <input type="text" name="subject" data-js="subject" required="required" />
                </div>

                <div class="col-sm-12">
                    <label>Mensagem:</label>
                    <textarea rows="4" name="message" data-js="message" required="required" ></textarea>
                </div>

                <div class="col-sm-5 col-md-4 pull-left">
                    <button type="submit" data-js="send-message" class="btn btn--primary type--uppercase">Enviar Mensagem</button>
                </div>

                <input type="hidden" name="aspam" data-js="anti-spam" value="true" />

            </form>
        </div>
        <!--end of row-->
    </div>
    <!--end of row-->
</div>
