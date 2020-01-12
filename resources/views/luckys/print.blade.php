
<h1>မဲနံပါတ္  @php $en_mya = [
                '0' => '၀', '1' => '၁', '2' => '၂', '3' => '၃', '4' => '၄', '5' => '၅', '6' => '၆', '7' => '၇', '8' => '၈', '9' => '၉',
            ]; echo(strtr($total['number'],$en_mya)) @endphp </h1>
<p>အလွဴခံပုဂၢိဳလ္ @if($total['winname'])<u>{{ uni2zg($total['winname']) }} </u>@else .............. @endif</p>
<hr><p></p>
@foreach($luckys as $lucky)
	<p><strong>ေငြပေဒသာ {{ strtr($lucky['amount'],$en_mya) }} ႏွင့္ {{ uni2zg($lucky['mtl']) }}</strong>{{ uni2zg($lucky['donar']) }}| {{ uni2zg($lucky['address']) }} (ေျပစာအမွတ္ {{ strtr($lucky['id'],$en_mya) }} )</p>
@endforeach

	<p>ေငြပေဒသာစုစုေပါင္း : {{ strtr($total['amount'],$en_mya) }}</p>
	<p>လွဴဖြယ္ပစၥည္းတန္ဖိုးစုစုေပါင္း : {{ strtr($total['mtl_value'],$en_mya) }}</p>
	
	<p>ႏွစ္ရပ္ေပါင္းတန္ဖိုး ({{ strtr($total['mtl_amount'],$en_mya)}}) က်ပ္</p>


