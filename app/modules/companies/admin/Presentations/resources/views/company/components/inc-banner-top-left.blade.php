<div class="col-md-3">

    <h4 class="block">Banner Destaque</h4>

    <div class="form-group last">
        <div class="col-md-12">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="width: 250px; height: 250px;">

                    @if( isset( $company->id ) )

                        @if(!empty( $company->getPathBanner( $company->id, 'top_left' ))) 

                            @php
                            $modify_image = true;
                            @endphp

                            <img src="{{ asset( sprintf('/storage/uploads/companies/%d/banners/top-left/%s', $company->id, $company->getPathBanner( $company->id, 'top_left' ))) }}" alt="" /> 
                        @else
                            <img src="http://www.placehold.it/250x250/EFEFEF/AAAAAA&amp;text=250x250" alt="" /> 
                        @endif

                    @else
                        <img src="http://www.placehold.it/250x250/EFEFEF/AAAAAA&amp;text=250x250" alt="" /> 
                    @endif

                </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 250px; max-height: 250px;"> </div>
                <div>
                    <span class="btn default btn-file">
                        <span class="fileinput-new"> {!! isset($modify_image) ? 'Modificar imagem' : 'Selecione a imagem' !!} </span>
                        <span class="fileinput-exists"> Alterar </span>
                        <input type="file" name="banner_top_left"> </span>
                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remover </a>
                </div>
            </div>
            
        </div>
    </div>
</div>
