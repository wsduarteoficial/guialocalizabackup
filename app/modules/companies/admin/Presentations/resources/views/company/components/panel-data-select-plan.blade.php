<div class="panel panel-default">
    <div class="panel-heading bold"> Informações de Planos </div>
    <div class="panel-body">
        <div class="form-group">        
            <div class="col-md-12">
                @if( Route::currentRouteName() !== 'admin.companies.edit')
                    <div id="pulsate-regular">                                        
                        <select name="plan_id" class="form-control jq_plan_id_register"></select> 
                    </div>
                    <div id="plan-not-pulsate" class="hide">                                        
                        <select name="plan_id" class="form-control jq_plan_id_register"></select> 
                    </div>
                @else
                    <select name="plan_id" class="form-control jq_plan_id_register"></select> 
                @endif
            </div>
        </div>
    </div>
</div>  