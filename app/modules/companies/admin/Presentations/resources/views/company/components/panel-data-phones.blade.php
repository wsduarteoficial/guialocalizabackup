<div class="panel panel-default">
    <div class="panel-heading bold">Informações Telefônicas </div>
    <div class="panel-body">
        <div class="col-md-4">
            <h4>Telefone Fixo</h4>
             
            <div id="input_phone_fixed">
            
                @if(!isset($company->phones))
                    @include('admin::company.components.input-fixed')
                @else

                    @php
                    $collection_fixed = collect($company->phones);           
                    
                    $phone_fixed = $collection_fixed->map(function ($item, $key) {
                        return $item->type == 'fixed' ? $item : false;
                    })->reject(function ($value, $key) {
                        return $value === false;
                    });          

                    $total =0;
                    @endphp

                    @foreach($phone_fixed->all() as $fixed)
                        @include('admin::company.components.input-fixed')
                        @php $total++ @endphp
                    @endforeach 

                    @if(count($phone_fixed->all()) <=0 )
                        @include('admin::company.components.input-fixed')
                    @endif

                @endif                            

            </div>

            <div id="input_phone_fixed_prepend"></div>   

        </div>
        <div class="col-md-4">
            <h4>Telefone Celular</h4>

            <div id="input_phone_cell">
           
                @if(!isset($company->phones))
                    @include('admin::company.components.input-cell')
                @else

                    @php
                    $collection_cell = collect($company->phones);           
                    
                    $phone_cell = $collection_cell->map(function ($item, $key) {
                        return $item->type == 'cell' ? $item : false;
                    })->reject(function ($value, $key) {
                        return $value === false;
                    });           
                    
                    $total =0;
                    @endphp
                    
                    @foreach($phone_cell->all() as $cell)
                        @include('admin::company.components.input-cell')
                        @php $total++ @endphp
                    @endforeach 

                    @if(count($phone_cell->all()) <=0 )
                        @include('admin::company.components.input-cell')
                    @endif 

                @endif                            

            </div>

            <div id="input_phone_cell_prepend"></div>                                                         
            
        </div>
        <div class="col-md-4">

            <h4>Outros</h4>

            <div id="input_phone_others">
            
                @if(!isset($company->phones))
                    @include('admin::company.components.input-cell')
                @else

                    @php
                    $collection_others = collect($company->phones);     
                    
                    $phone_others = $collection_others->map(function ($item, $key) {
                        return $item->type == 'others' ? $item : false;
                    })->reject(function ($value, $key) {
                        return $value === false;
                    });           
                    
                    $total=0;
                    @endphp

                    @foreach($phone_others->all() as $others)
                        @include('admin::company.components.input-others')
                        @php $total++ @endphp
                    @endforeach 

                    @if(count($phone_others->all()) <=0 )
                        @include('admin::company.components.input-others')
                    @endif

                @endif                              

            </div>

            <div id="input_phone_others_prepend"></div> 

        </div>
    </div>
</div>