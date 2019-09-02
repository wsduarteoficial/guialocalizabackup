@php
if(!isset($total))
    $total = 0;
@endphp
<div class="row margin-top-10">
    <div class="col-md-10">
        <div class="input-group">
            <input type="text" value="{{ isset( $fixed->number ) ? $fixed->number : '' }}" {!! $total <= 0 ? 'id="jq_phone_fixed"' : '' !!} name="phone_fixed[]" class="form-control phone jq_phone_number{{ isset( $fixed->id ) ? $fixed->id : '' }}" placeholder="(xx) xxxx-xxxx">
            <span class="input-group-btn">
                <button class="btn default jq_input_phone_fixed_remove_db" type="button" {!! isset( $fixed->id ) ? 'data-phone-id="'. $fixed->id .'" data-company-id="'. $company->id .'"' : '' !!}><i class="fa fa-minus"></i></button>
                @if( $total <= 0 )
                <button class="btn green jq_input_phone_fixed_add" type="button"><i class="fa fa-plus"></i></button>
                @endif
            </span>
        </div> 
    </div>                                 
</div>