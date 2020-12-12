@php 
   $en_mya = Config('mmconverter.number.en_mya');
@endphp
<table width="200">
    <tbody>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>ေျပစာအမွတ္</td>
            <td>{{ strtr($bill['id'],$en_mya) }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>ရက္စြဲ</td>
            <td>{{ \Carbon\Carbon::parse($bill['created_at'])->toDayDateTimeString() }}</td>
        </tr>
       
    </tbody>
</table>
<br>
<hr>
<br>
<p></p>
<table>
    <tbody>
        <tr>
            <td width="20%">အလႉေငြ</td>
            <td width="80%">{{ strtr($bill['amount'],$en_mya) }} က်ပ္ {{ $bill['material'] }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td width="20%">အလွဴရွင္အမည္</td>
            <td width="80%">{{  $bill['doner'] }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td width="20%">ေနရပ္လိပ္စာ </td>
            <td width="80%">{{ $bill['address'] }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td align="right">ပစၥည္းလက္ခံသူ</td>
        </tr>
    </tbody>
</table>




