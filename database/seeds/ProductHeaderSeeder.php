<?php

use App\ProductHeader;
use Illuminate\Database\Seeder;

class ProductHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	ProductHeader::create([
    		'prd_hd_title' => 'Our Products',
        	'prd_hd_caption' => 'See Our Products',
            'prd_hd_image' => 'default.jpg',
        	'prd_hd_active' => 1
    	]);

        factory(App\ProductHeader::class, 3)->create();
    }
}
