@php
if(!isset($total))
    $total = 0;
@endphp
<div class="row margin-top-10">
    <div class="col-md-10">
        <div class="input-group">
            <input type="text" value="{{ isset( $cell->number ) ? $cell->number : '' }}" {!! $total <= 0 ? 'id="jq_phone_cell"' : '' !!} name="phone_cell[]" class="form-control phone jq_phone_number{{ isset( $cell->id ) ? $cell->id : ''}}" placeholder="(xx) x-xxxx-xxxx">
            <span class="input-group-btn">
                <button class="btn default jq_input_phone_cell_remove_db" type="button" {!! isset( $cell->id ) ? 'data-phone-id="'. $cell->id .'" data-company-id="'. $company->id .'"' : '' !!}><i class="fa fa-minus"></i></button>
                @if( $total <= 0 )
                    <button class="btn yellow jq_input_phone_cell_add" type="button"><i class="fa fa-plus"></i></button>
                @endif
            </span>
        </div> 
    </div>                                 
</div>