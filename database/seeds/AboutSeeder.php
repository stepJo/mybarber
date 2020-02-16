<?php

use Illuminate\Database\Seeder;
use App\About;
class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	About::create([
    		'ab_title' => 'About',
	        'ab_caption' => 'About Caption',
	        'ab_desc' => 'About Description',
	        'ab_image' => 'default.jpg',
	        'ab_active' => 1
    	]);

        factory(App\About::class, 3)->create();
    }
}
