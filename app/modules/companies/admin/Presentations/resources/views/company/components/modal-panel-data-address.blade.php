
<!-- /.modal -->
<div class="modal fade modal-register-district" tabindex="-1" data-width="400">

    <div class="modal-dialog">
        <div class="modal-content">

            <form name="create-register-district" id="form-register-district" action="">                

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title bold">Adicionar Bairro</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">                    
                            <input required="required" id="register-district-name" type="text" class="col-md-12 form-control jq_disabled" placeholder="Novo Bairro" name="name"> 
                            <br>
                            <br>
                            <h4>Cidade: <span class="text-register-city"></span> </h4>
                            <input type="hidden" class="hidden-register-city-id" name="city_id">                      
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Fechar</button>
                    <button type="submit" class="btn green">Cadastrar Novo</button>
                </div>

            </form>

        </div>

    </div>

</div>

<!-- /.modal -->
<div class="modal fade modal-register-place" tabindex="-1" data-width="400">

    <div class="modal-dialog">
        <div class="modal-content">

            <form name="create-register-place" id="form-register-place" action="">                

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title bold">Adicionar Endereço</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">                    
                            <input required="required" id="register-place-name" type="text" class="col-md-12 form-control jq_disabled" placeholder="Novo Endereço" name="name"> 
                            <br>
                            <br>
                            <h4>Cidade: <span class="text-register-city"></span> </h4>
                            <input type="hidden" class="hidden-register-city-id" name="city_id">                      
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Fechar</button>
                    <button type="submit" class="btn green">Cadastrar Novo</button>
                </div>

            </form>

        </div>

    </div>

</div>