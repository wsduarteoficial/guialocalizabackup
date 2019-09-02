<div class="col-md-5">
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-fit">
                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-layers font-green"></i>
                        <span class="caption-subject font-green bold uppercase">Galeria de Imagens</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="mt-element-card mt-element-overlay">
                        <div class="row">

                            @if( isset( $company->gallery ) )                            
                                
                                @php
                                $total_galery = count( $company->gallery );
                                @endphp

                                @foreach($company->gallery as $photo)
                                <div id="gallery-photo-{{ $photo->id }}" class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="mt-card-item">
                                        <div class="mt-card-avatar mt-overlay-4">
                                            <img src="{{ asset( sprintf('/storage/uploads/companies/%d/photos/%s', $company->id, $photo->image )) }}" />
                                            <div class="mt-overlay" style="margin-top:-4px;">
                                                <h2><i class="fa fa-remove jq_remove_photo_gallery" data-id="{{ $photo->id }}" style="cursor: pointer;" title="Excluir Foto"></i></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            @endif

                            @php
                            $total = isset( $total_galery ) ? $total_galery : 0;
                            @endphp

                            @for($i=1; $i <= ( 8 - $total ); $i++ )
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <div class="mt-card-item">
                                    <div class="mt-card-avatar mt-overlay-4">
                                        <img src="http://www.placehold.it/120x120/EFEFEF/AAAAAA&amp;text=1024x768" />
                                    </div>
                                </div>
                            </div>
                            @endfor

                        </div>
                    </div>

                    <div class="form-group last">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                           <input type="file" name="photos[]" multiple> </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END : USER CARDS -->

</div>