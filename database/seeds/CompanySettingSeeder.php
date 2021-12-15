<?php

use Illuminate\Database\Seeder;
use App\CompanySetting;

class CompanySettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!CompanySetting::exists()){
            $setting = new CompanySetting();
            $setting->company_name = 'Power of NINJA';
            $setting->company_email = 'ninja@gmail.com';
            $setting->company_address = 'Tokyo, Toshima-ku, HigashiIkebukuro';
            $setting->company_phone = '08054414221';
            $setting->office_start_time = '09:00:00';
            $setting->office_end_time = '17:00:00';
            $setting->break_start_time = '12:00:00';
            $setting->break_end_time = '13:00:00';
            $setting->save();
        }
    }
}
