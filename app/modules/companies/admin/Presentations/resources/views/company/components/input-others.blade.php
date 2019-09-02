@php
if(!isset($total))
    $total = 0;
@endphp
<div class="row margin-top-10">
    <div class="col-md-10">
        <div class="input-group">
            <input type="text" value="{{ isset( $others->number ) ? $others->number : '' }}" {!! $total <= 0 ? 'id="jq_phone_others"' : '' !!} name="phone_others[]" class="form-control phone jq_phone_number{{ isset( $others->id ) ? $others->id : '' }}">
            <span class="input-group-btn">
                <button class="btn default jq_input_phone_others_remove_db" type="button" {!! isset( $others->id ) ? 'data-phone-id="'. $others->id .'" data-company-id="'. $company->id .'"' : '' !!}><i class="fa fa-minus"></i></button>
                @if( $total <= 0 )
                <button class="btn purple jq_input_phone_others_add" type="button"><i class="fa fa-plus"></i></button>
                @endif
            </span>
        </div> 
    </div>                                 
</div>