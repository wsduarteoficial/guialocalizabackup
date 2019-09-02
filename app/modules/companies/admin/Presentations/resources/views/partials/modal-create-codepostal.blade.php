
<!-- /.modal -->
<div class="modal fade modal-register-codepostal" tabindex="-1" data-width="400">

    <div class="modal-dialog">
        <div class="modal-content">

            <form id="register-codepostal" action="">                

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title bold">Cadastrar CEP</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">                    
                            <input required="required" oninvalid="this.setCustomValidity('Informe o CEP corretamente.')" pattern="\d{5}-?\d{3}" type="text" class="col-md-12 form-control" placeholder="Digite o CEP" id="cep" name="code"> 
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">                    
                             <div class="input-icon margin-top-10">
                                <i class="fa fa-th"></i>
                                <select id="jq_combo_location_state" name="state" class="form-control" required="required">
                                </select> 
                            </div>
                        </div>
                    </div>

                    <div id="jq_div_combo_location_city" class="row hide">
                        <div class="col-md-12">                    
                            <div class="input-icon margin-top-10">
                                <i class="fa fa-th-list"></i>
                                <select id="jq_combo_location_city" name="city" class="form-control" disabled>
                                    <option value="">Selecione a Cidade</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Fechar</button>
                    <button type="submit" class="btn green">Cadastrar</button>
                </div>

            </form>

        </div>
    </div>
</div>
