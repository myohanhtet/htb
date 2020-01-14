
<h1>မဲနံပါတ္  @php $en_mya = Config('mmconverter.number.en_mya');
	echo(strtr($total['number'],$en_mya));
	$total_id = $luckys->count();
	@endphp 
</h1>
<p>အလွဴခံပုဂၢိဳလ္ @if($total['winname'])<u>{{ uni2zg($total['winname']) }} </u>@else .............. @endif</p>
<hr><p></p>
@foreach($luckys as $lucky)
	<p><strong>ေငြပေဒသာ {{ strtr($lucky['amount'],$en_mya) }} ႏွင့္ {{ uni2zg($lucky['mtl']) }}</strong>{{ uni2zg($lucky['donar']) }}| {{ uni2zg($lucky['address']) }} (ေျပစာအမွတ္ {{ strtr($lucky['id'],$en_mya) }} )</p>
@endforeach
<hr><p></p><p></p><p></p>
	<p>ေငြပေဒသာစုစုေပါင္း : {{ strtr($total['amount'],$en_mya) }} က်ပ္</p>
	<p>လွဴဖြယ္ပစၥည္းတန္ဖိုးစုစုေပါင္း : {{ strtr($total['mtl_value'],$en_mya) }} က်ပ္</p>
	
	<p>ေစာင္ေရေပါင္း ({{ strtr($total_id,$en_mya) }}) ေစာင္</p>
	<p>ႏွစ္ရပ္ေပါင္းတန္ဖိုး ({{ strtr($total['mtl_amount'],$en_mya)}}) က်ပ္</p>


