<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonialHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonial_headers', function (Blueprint $table) {
            $table->bigIncrements('test_hd_id');
            $table->string('test_hd_title');
            $table->longText('test_hd_caption');
            $table->string('test_hd_image')->default('default.jpg');
            $table->integer('test_hd_active')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testimonial_headers');
    }
}
