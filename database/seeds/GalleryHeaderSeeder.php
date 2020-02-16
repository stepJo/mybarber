<?php

use App\GalleryHeader;
use Illuminate\Database\Seeder;

class GalleryHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	GalleryHeader::create([
    		'gal_hd_title' => 'Our Gallery',
	        'gal_hd_image' => 'default.jpg',
	        'gal_hd_active' => 1
    	]);

        factory(App\GalleryHeader::class, 3)->create();
    }
}
