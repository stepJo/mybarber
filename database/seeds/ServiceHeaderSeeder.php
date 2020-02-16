<?php

use App\ServiceHeader;
use Illuminate\Database\Seeder;

class ServiceHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	ServiceHeader::create([
    		'serv_hd_title' => 'Our Services',
        	'serv_hd_caption' => 'Our kindly services',
            'serv_hd_image' => 'default.jpg',
        	'serv_hd_active' => 1
    	]);

        factory(App\ServiceHeader::class, 3)->create();
    }
}
