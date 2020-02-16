<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
    		'set_web_title' => 'MyBarber',
        	'set_m_author' => 'My Author',
        	'set_m_desc' => 'My Website',
        	'set_m_keyword' => 'My Keyword',
        	'set_web_logo' => 'default.jpg'
    	]);
    }
}
