<?php

use App\ReservationMessage;
use Illuminate\Database\Seeder;

class ReservationMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReservationMessage::create([
    		'rsv_msg_status' => 'confirm',
    		'rsv_msg_name' => 'Admin',
    		'rsv_msg_subject' => 'Reservation Aprrovement',
    		'rsv_msg_content' => 'Reservation confirm',
    		'rsv_msg_footer' => 'Copyright 2020'
    	]);

    	ReservationMessage::create([
    		'rsv_msg_status' => 'dismiss',
    		'rsv_msg_name' => 'Admin',
    		'rsv_msg_subject' => 'Reservation Fail',
    		'rsv_msg_content' => 'Reservation dismiss',
    		'rsv_msg_footer' => 'Copyright 2020'
    	]);
    }
}
