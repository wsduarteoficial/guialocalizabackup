@if($phone->type=='fixed')
	Tel.: {{ tools_mask($phone->number, '(##) ####-#...')}}
@elseif($phone->type=='cell')
	Cel.: {{ tools_mask($phone->number, '(##) #####-#...')}}
@else
	{{ $phone->number }}
@endif