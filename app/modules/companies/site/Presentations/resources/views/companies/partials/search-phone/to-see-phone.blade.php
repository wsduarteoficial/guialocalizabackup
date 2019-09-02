@desktop

	@if($company->plan_id >1)

	<div class="row phone jq_view_number_phone" data-sponsors="true" data-company="{{$company->id}}"
	     data-phone="{{$phone->id}}">
	    <div class="col-xs-12 col-sm-3 col-md-3">
			@include('site::companies.partials.search-phone.inc-type-phone')	     
	    </div>
	    <div class="col-xs-12 col-sm-9 col-md-9">
	        <div class="row text-left">
	            <span class="btn btn--primary btn--xs btn__text">Ver Telefone </span>
	        </div>
	    </div>
	</div>

	@else

	<div class="row phone jq_view_number_phone" data-company="{{$company->id}}"
	                         data-phone="{{$phone->id}}">
	    <div class="col-xs-12 col-sm-7 col-md-7">
			@include('site::companies.partials.search-phone.inc-type-phone')
	    </div>
	    <div class="col-xs-12 col-sm-3 col-md-3">
	        <div class="row text-left">
	            <span class="btn btn--primary btn--xs btn__text">Ver Telefone </span>
	        </div>
	    </div>
	</div>

	@endif

@elsedesktop
    <div class="row phone jq_view_number_phone" data-company="{{$company->id}}"
         data-phone="{{$phone->id}}">
        <div class="col-xs-12 col-sm-8 col-xs-8">
			@include('site::companies.partials.search-phone.inc-type-phone') 
		</div>
        <div class="col-xs-12 col-sm-4 col-xs-4">
            <div class="row text-left">
                <span class="btn btn--primary btn--xs btn__text">Ver Telefone </span>
            </div>
        </div>
    </div>
@enddesktop
