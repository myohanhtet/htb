
	<h1>မဲနံပါတ္ {{ $total['number'] }}</h1>
	<p>အလွဴခံပုဂၢိဳလ္ ......................................... </p>
	<hr><p></p>
	@foreach($luckys as $lucky)
		<p><strong>ေငြပေဒသာ {{ $lucky['amount'] }} ႏွင့္ {{ $lucky['mtl'] }}</strong>{{ $lucky['donar'] }}| {{ $lucky['address'] }}</p>
	@endforeach
	<p>ေငြပေဒသာစုစုေပါင္း : {{ $total['amount'] }}</p>
	<p>လွဴဖြယ္ပစၥည္းတန္ဖိုးစုစုေပါင္း : {{ $total['mtl_value'] }}</p>


