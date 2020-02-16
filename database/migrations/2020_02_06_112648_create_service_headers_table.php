<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_headers', function (Blueprint $table) {
            $table->bigIncrements('serv_hd_id');
            $table->string('serv_hd_title');
            $table->longText('serv_hd_caption');
            $table->string('serv_hd_image');
            $table->integer('serv_hd_active')->default('0');
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
        Schema::dropIfExists('service_headers');
    }
}
