<?php

use App\ErrorPage;
use Illuminate\Database\Seeder;

class ErrorPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ErrorPage::create([
    		'error_pg_title' => 'Error 404',
    		'error_pg_desc' => 'Page not found',
    		'error_pg_image' => 'default.jpg'
    	]);
    }
}
