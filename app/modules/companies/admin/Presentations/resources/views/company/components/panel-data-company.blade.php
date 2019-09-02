<div class="panel panel-default">
    <div class="panel-heading bold"> Dados da Empresa (Busca no Site)</div>
    <div class="panel-body">
        
        <div class="row">                                
            <div class="col-md-12">
                <label for="">Nome Fantasia</label>
                <input type="text" value="{{ isset( $company->name_fantasy ) ? $company->name_fantasy : '' }}" name="name_fantasy" class="form-control" placeholder="Nome Fantasia" required="required">
            </div>
            
        </div>

        <div class="row margin-top-10">
            <div class="col-md-6">
                
                <label for="">Descrição ou Slogan</label>                                 
                <textarea class="form-control" name="description" placeholder="Descrição ou Slogan" rows="3">{{ isset( $company->description ) ? $company->description : '' }}</textarea>

            </div>
            <div class="col-md-6">
                
                <label for="">Tags</label>
                <input type="text" name="tags" class="form-control input-large" value="{{ isset( $company->tags ) ? $company->tags : '' }}" data-role="tagsinput">   
            </div>
        </div> 

    </div>
</div>