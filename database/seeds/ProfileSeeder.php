<?php

use App\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create([
    		'profile_phone' => '111111111111',
    		'profile_email' => 'company@email.co.id',
    		'profile_fb' => 'companyfb',
    		'profile_ig' => 'companyig',
    		'profile_twitter' => 'companytwitter',
    		'profile_address' => 'company address'
    	]);
    }
}
