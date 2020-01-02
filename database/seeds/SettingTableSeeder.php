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
            'title',
            'invoice-title-two',
            'invoice-title-three',
            'invoice-title-one',
            'dash-title-two',
            'dash-title-three',
            'dash-title-one',
            'dash-title-four'
        ];
        
        foreach($settings as $setting){
            Setting::create([
                'name' => $setting
            ]);
        }

    }
}
