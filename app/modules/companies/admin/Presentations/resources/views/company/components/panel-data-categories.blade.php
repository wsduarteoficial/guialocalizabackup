<div class="panel panel-default">
    <div class="panel-heading bold"> Categorizações </div>
    <div class="panel-body">        
    
        <div class="row">
            <div class="col-md-6">
                <label for="">Categoria</label>
                <div class="input-group">
                    @php
                        $category_id = false;
                    @endphp

                    @if( isset($company->categories) )

                        @foreach($company->categories as $category)
                            @php
                                $category_id = $category->id;
                            @endphp
                        @endforeach

                    @endif
                    <select name="category_id" id="category_id" class="bs-select form-control" data-live-search="true" data-size="8" required="required">
                        <option value="" class="jq_disabled">Selecione a categoria</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ tools_selected($category->id, $category_id ) }}>{{ $category->name }}</option>
                        @endforeach
                    </select>

                    <span class="input-group-addon">
                        <i class="fa fa-search"></i>
                    </span>
                </div>
                
            </div>
            <div class="col-md-6">
                <label for="">Subcategoria</label>
                <div class="input-group">

                    <select name="subcategory_id" id="subcategory_id" class="form-control" disabled>

                        @if( isset( $company->subcategories ) && count( $company->subcategories) > 0 )
                            <option value="">Primeiro selecione a categoria</option>
                        @else
                             <option value="">Não possui subcategorias cadastradas.</option>
                        @endif

                        @if( isset($company->subcategories) )

                            @foreach($company->subcategories as $subcategory)
                                @php
                                    $subcategory_id = $subcategory->id;
                                @endphp
                            @endforeach

                            @foreach($company->subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}" {{ tools_selected($subcategory->id, $subcategory_id ) }}>{{ $subcategory->name }}</option>
                            @endforeach

                        @endif
                        
                    </select>

                    <span class="input-group-addon">
                        <i class="fa fa-refresh"></i>
                    </span>
                </div>
            
            </div>
        </div>
    </div>
</div>