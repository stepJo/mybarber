<?php

use App\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
    		'admin_name' => 'Admin',
    		'admin_email' => 'admin@gmail.com',
	        'admin_pwd' => Hash::make('12345678'),
	        'admin_image' => 'default.jpg'
    	]);
    }
}
