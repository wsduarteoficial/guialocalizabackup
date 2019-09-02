<div class="col-md-4">
    <h4 class="block">Banner Lateral</h4>
    <div class="form-group last">
        <div class="col-md-12">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="width: 300px; height: 250px;">

                    @if( isset( $company->id ) )
                        
                        @if(!empty( $company->getPathBanner( $company->id, 'right_side' ) )) 

                            @php
                            $modify_image = true;
                            @endphp

                            <img src="{{ asset( sprintf('/storage/uploads/companies/%d/banners/right-side/%s', $company->id, $company->getPathBanner( $company->id, 'right_side' ))) }}" alt="" /> 
                        @else
                            <img src="http://www.placehold.it/300x250/EFEFEF/AAAAAA&amp;text=300x250" alt="" /> 
                        @endif

                    @endif

                </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 250px;"> </div>
                <div>
                    <span class="btn default btn-file">
                        <span class="fileinput-new"> {!! isset( $modify_image ) ? 'Modificar imagem' : 'Selecione a imagem' !!}</span>
                        <span class="fileinput-exists"> Alterar </span>
                        <input type="file" name="banner_right_side"> </span>
                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remover </a>
                </div>
            </div>
        </div>
    </div>   
</div>