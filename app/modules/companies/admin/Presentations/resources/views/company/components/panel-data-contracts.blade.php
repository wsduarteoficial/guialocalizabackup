<div id="info-sponsors-01" class="panel panel-default">
    <div class="panel-heading bold"> Informações contratuais (Controle interno)</div>
    <div class="panel-body">
        
        <div class="row">  

            <div class="col-md-4">
                <label for="">CPF/CPNJ</label>                              
                <input type="text" name="cpf_cnpj" value="{{ isset( $contract->client->cpf_cnpj ) ? $contract->client->cpf_cnpj : '' }}" class="form-control jq_data_required cpf_cnpj" placeholder="CPF/CPNJ">
            </div>                                

            <div class="col-md-8">
                <label for="">Razão Social</label>
                <input type="text" name="company_name" value="{{ isset($contract->client->company_name) ? $contract->client->company_name : ''}}" class="form-control jq_data_required" placeholder="Razão Social">
            
            </div>                             
            
        </div>

        <div class="row margin-top-10">
            <div class="col-md-3">

                <label for="">Início Contrato</label>                              
                <input type="date" name="start_at" value="{{ isset( $contract->start_at ) ? $contract->start_at : '' }}" class="form-control jq_data_required" placeholder="Nome Contrante">
                
            </div>
            <div class="col-md-3">
                <label for="">Término Contrato</label>   
                <input type="date" name="expired_at" value="{{ isset( $contract->expired_at ) ? $contract->expired_at : '' }}" class="form-control jq_data_required">
            </div>  
            <div class="col-md-3">                                    
                <label for="">Nome Contrante</label>                              
                <input type="text" name="contracting_name" value="{{ isset( $contract->client->contracting_name ) ? $contract->client->contracting_name : ''}}" class="form-control jq_data_required" placeholder="Nome Contrante">

            </div>
            <div class="col-md-3">
                
                <label for="">Telefone Contrante</label>                              
                <input type="text" name="phone" value="{{ isset($contract->client->phone) ? $contract->client->phone : ''}}" id="id_phone" class="form-control jq_data_required" placeholder="(xx) xxxx-xxxx">
            
            </div>
            
        </div>

        <div class="row margin-top-10">
            <div class="col-md-6">

                <label for="">E-mail de notificações (Principal)</label>                              
                <input type="email" name="email_primary" value="{{ isset($contract->client->email_primary) ? $contract->client->email_primary : ''}}" class="form-control jq_data_required" placeholder="email@exemplo.com.br">
                
            </div>
            <div class="col-md-6">
                
                <label for="">E-mail de notificações (Secundário)</label>   
                <input type="email" name="email_secondary" value="{{ isset($contract->client->email_secondary) ? $contract->client->email_secondary : ''}}" class="form-control" placeholder="email@exemplo.com.br">
                
            </div>  
            
        </div>
        <div class="row margin-top-10">
            <div class="col-md-12">
                <label for="">Observações</label>
                <textarea class="form-control" name="note" placeholder="Observações" rows="3">{{ isset( $contract->note ) ? $contract->note : '' }}</textarea>
            </div>
        </div> 

    </div>
</div> 