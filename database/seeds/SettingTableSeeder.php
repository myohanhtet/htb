<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            'title' => 'ထန်းတပင်ကျောင်းတိုတ်',
            'invoice-title-two' => 'ကိုးနဝင်းကပ်ကျော်သိမ်ဦးစေတီတော်၊ (၁၀၅)ကြိမ်မြောက်၊ ဗုဒ္ဓပူဇနိယပွဲတော်',
            'invoice-title-three' => 'စာရေးတံမဲ လောင်းလှူပူဇော်ပွဲ၊ စာရေးတံမဲ လက်ခံဖြတ်ပိုင်း',
            'invoice-title-one'=>'ရန်ကုန်တိုင်းဒေသကြီး၊ ကမာရွတ်မြို့နယ်၊ ထန်းတပင်ကျောင်းတိုက်',
            'dash-title-two' => '(၁၀၅)ကြိမ်မြောက်၊ ဗုဒ္ဓပူဇနိယပွဲတော်',
            'dash-title-three' => 'စာရေးတံမဲ လောင်းလှူပူဇော်ပွဲ',
            'dash-title-one' => 'ရန်ကုန်တိုင်းဒေသကြီး၊ ကမာရွတ်မြို့နယ်၊ ထန်းတပင်ကျောင်းတိုက်၊ ဆုတောင်းပြည့်ကိုးနဝင်းကပ်ကျော်သိမ်ဦးစေတီတော်',
            'dash-title-four' => 'ငွေပဒေသာပင် နှင့် ပစ္စည်းတန်ဖိုး စာရင်းချုပ်',
            'pathan-invoice-title-two' => '(၁၀၅)ကြိမ်မြောက်၊ ဗုဒ္ဓပူဇနိယပွဲတော်၊ မဟာပဋ္ဌာန်းရွတ်ဖတ်ပူဇော်ပွဲ',
            'pathan-invoice-title-three' => 'ပဋ္ဌာန်းအလှူတော် လက်ခံဖြတ်ပိုင်း',
            'pathan-invoice-title-one'=>'ကမာရွတ်မြို့နယ်၊ ထန်းတပင်ကျောင်းတိုက်၊ ကိုးနဝင်းကပ်ကျော်သိမ်ဦးစေတီတော်',
        ];
        
        foreach($settings as $key => $value){
            Setting::create([
                'name' => $key,
                'value' => $value
            ]);
        }

    }
}
