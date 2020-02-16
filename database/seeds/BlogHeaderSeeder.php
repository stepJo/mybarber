<?php

use App\BlogHeader;
use Illuminate\Database\Seeder;

class BlogHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BlogHeader::create([
    		'blog_hd_title' => 'Our Blog',
    		'blog_hd_caption' => 'Our daily blogs',
	        'blog_hd_image' => 'default.jpg',
	        'blog_hd_active' => 1
    	]);

        factory(App\BlogHeader::class, 3)->create();
    }
}
