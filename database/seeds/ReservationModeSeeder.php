<?php

use App\ReservationMode;
use Illuminate\Database\Seeder;

class ReservationModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReservationMode::create([
    		'rsv_mode_active' => 1
    	]);
    }
}
