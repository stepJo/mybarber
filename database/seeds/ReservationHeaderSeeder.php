<?php

use App\ReservationHeader;
use Illuminate\Database\Seeder;

class ReservationHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReservationHeader::create([
    		'rsv_hd_title' => 'Make Reservation',
        	'rsv_hd_caption' => 'Book now',
        	'rsv_hd_image' => 'default.jpg',
        	'rsv_hd_active' => 1
    	]);

        factory(App\ReservationHeader::class, 3)->create();
    }
}
