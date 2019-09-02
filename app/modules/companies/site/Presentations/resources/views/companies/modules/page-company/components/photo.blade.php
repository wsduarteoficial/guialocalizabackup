@if($company->gallery->count() > 0)

<div class="row">
    
    <a id="photos"></a>
    <div class="boxed boxed--border">
        <h4>Galeria de Imagens</h4>
       
        <div>

            @foreach($company->gallery as $photo)

            <a href="{{ asset( sprintf('/storage/uploads/companies/%d/photos/%s', $company->id, $photo->image )) }}" data-lightbox="Gallery 1">
                <img alt="Thumb" src="{{ asset( sprintf('/storage/uploads/companies/%d/photos/%s', $company->id, $photo->image )) }}" style="height: 50px" />
            </a>           

            @endforeach
        </div>
    </div>
    
</div>

@endif
