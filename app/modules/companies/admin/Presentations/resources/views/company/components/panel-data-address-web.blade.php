<div class="panel panel-default">
    <div class="panel-heading bold"> Endereços na WEB </div>
    <div class="panel-body">        
        <div class="row">
            <div class="col-md-4">
                <label for="">URL Site</label>
                <input type="url" name="website" value="{{ isset( $company->website ) ? $company->website : '' }}" class="form-control" placeholder="www.exemplo.com.br">
            </div>

            <div class="col-md-4">
                <label for="">Email para atendimento aos clientes (Público)</label>
                <input type="email" name="email" value="{{ isset( $company->email ) ? $company->email : '' }}" class="form-control" placeholder="contato@site.com.br">
            </div>

            <div class="col-md-4">
                <label for="">URL Facebook</label>
                <input type="url" name="facebook" value="{{ isset( $company->facebook ) ? $company->facebook : '' }}" class="form-control" placeholder="Facebook">
            </div>
        </div>
    </div>
</div> 
