@desktop
<div class="row update">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="btn_alteration">
            @include('site::companies.partials.search-phone.btn-solicitation')
        </div>
    </div>
</div>
@elsedesktop
<div class="row update mobile-btn-solicitation">
    <div class="col-xs-12 col-sm-12 col-md-12 ">
        @include('site::companies.partials.search-phone.btn-solicitation') 
    </div>
</div>
@enddesktop
