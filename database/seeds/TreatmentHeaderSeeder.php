<?php

use App\TreatmentHeader;
use Illuminate\Database\Seeder;

class TreatmentHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	TreatmentHeader::create([
    		'treat_hd_title' => 'Our Best Treatment',
        	'treat_hd_caption' => 'Best of our treatment',
        	'treat_hd_image' => 'default.jpg',
        	'treat_hd_active' => 1
    	]);

        factory(App\TreatmentHeader::class, 3)->create();
    }
}
