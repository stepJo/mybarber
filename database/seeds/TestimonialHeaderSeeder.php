<?php

use App\TestimonialHeader;
use Illuminate\Database\Seeder;

class TestimonialHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	TestimonialHeader::create([
    		'test_hd_title' => 'Our Customer Testimonial',
        	'test_hd_caption' => 'Best of our client',
        	'test_hd_image' => 'default.jpg',
        	'test_hd_active' => 1
    	]);

        factory(App\TestimonialHeader::class, 3)->create();
    }
}
