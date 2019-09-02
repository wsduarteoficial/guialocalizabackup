<div class="panel panel-default">
    <div class="panel-heading bold"> Endereço Físico da Empresa</div>
    <div class="panel-body">                            

        <div class="row">
        
            <div class="col-md-2">
                <label for="">CEP</label>
                <div class="input-group">
                    <input type="text" value="{{ isset( $company->zipcode ) ?  $company->zipcode->code : '' }}" name="zipcode_id" id="id_zipcode" class="form-control" placeholder="xxxxx-xxx" required="required">
                    <span class="input-group-addon">
                        <i class="fa fa-search"></i>
                    </span>                                 
                </div>
            </div>

            <div class="col-md-3">
                <label for="">Estado</label>
                <select class="form-control jq_address" name="state_id" required="required" disabled>
                    <option value="">Estado</option>
                    @foreach($states as $state)
                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                    @endforeach        
                </select>
            </div>

            <div class="col-md-3">
                <label for="">Cidade</label>

                <select class="form-control jq_address" name="city_id" required="required" disabled>
                    <option>Cidade</option>          
                </select>                                             
                
            </div>
            <div class="col-md-4">
                <label for="">Bairro</label>
                <div class="input-group">
                    <input type="text" name="district" value="{{ isset( $company->district ) ?  $company->district->name : '' }}" class="form-control jq_address" placeholder="Bairro" disabled>
                    <input type="hidden" name="district_id" value="{{ isset( $company->district_id ) ? $company->district_id : '' }}"/>
                    <span class="input-group-addon">
                        <i class="fa fa-search"></i>
                    </span>
                    <span class="input-group-addon btn-group">                                               

                        <i class="fa fa-chevron-circle-down cursor-pointer" data-toggle="dropdown"></i> 

                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="#" id="modal-register-district" data-target=".modal-register-district" data-toggle="modal">
                                    <i class="fa fa-plus"></i> Adicionar </a>
                            </li>

                            <li class="divider"> </li>
                            <li>
                                <a href="#" data-opentarget="_blank" data-route="{{ route('admin.districts.all') }}" data-target=".modal-locations" class="jq_locations" data-toggle="modal">
                                    <i class="fa fa-gears"></i> Gerênciar Bairros 
                                </a>
                            </li>
                        </ul>
                                
                    </span>

                </div>

                <span class="suggest hide">
                    <span>Sugestão:</span>                                       
                    <span class="result_api jq_suggest_district" title="Clique"></span>
                </span>
            </div>
            
        </div>
        <div class="row margin-top-10">

            <div class="col-md-6">
                <label for="">Endereço</label>
                <div class="input-group">
                    <input type="text" name="place" value="{{ isset( $company->place ) ?  $company->place->name : '' }}" class="form-control jq_address" placeholder="Endereço" disabled>
                    <input type="hidden" name="place_id" value="{{ isset( $company->place_id ) ? $company->place_id : '' }}"/>

                    <span class="input-group-addon">
                        <i class="fa fa-search"></i>
                    </span>
                    <span class="input-group-addon btn-group">                                               

                        <i class="fa fa-chevron-circle-down cursor-pointer" data-toggle="dropdown"></i> 

                        <ul class="dropdown-menu">
                            <li>
                                <a href="#" id="modal-register-place" data-target=".modal-register-place" data-toggle="modal">
                                    <i class="fa fa-plus"></i> Adicionar 
                                </a>
                            </li>
                          
                            <li class="divider"> </li>
                            <li>
                                <a href="#" data-opentarget="_blank" data-route="{{ route('admin.places.all') }}" data-target=".modal-locations" class="jq_locations" data-toggle="modal">
                                    <i class="fa fa-gears"></i> Gerênciar Logradouros 
                                </a>
                            </li>
                        </ul>
                                
                    </span>

                </div>
                <span class="suggest hide">
                    <span>Sugestão:</span>
                    <span class="result_api jq_suggest_place" title="Clique"></span>
                </span>
            </div>
            <div class="col-md-2">
                <label for="">Número</label>
                <input type="text" name="numeral" value="{{ isset( $company->numeral ) ? $company->numeral : '' }}" class="form-control jq_address" placeholder="Número" disabled>
            </div>
            <div class="col-md-4">
                <label for="">Complemento</label>
                <input type="text" name="complement" value="{{ isset( $company->complement ) ? $company->complement : '' }}" class="form-control jq_address" placeholder="Complemento" disabled>
            </div>
        </div>
    </div>
</div>
