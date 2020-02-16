<?php

use App\TeamHeader;
use Illuminate\Database\Seeder;

class TeamHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	TeamHeader::create([
    		'tm_hd_title' => 'Our Teams',
        	'tm_hd_caption' => 'Proffesional teams',
        	'tm_hd_active' => 1
    	]);

        factory(App\TeamHeader::class, 3)->create();
    }
}
