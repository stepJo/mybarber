<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_headers', function (Blueprint $table) {
            $table->bigIncrements('rsv_hd_id');
            $table->string('rsv_hd_title');
            $table->longText('rsv_hd_caption');
            $table->string('rsv_hd_image');
            $table->integer('rsv_hd_active')->default('0');
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
        Schema::dropIfExists('reservation_headers');
    }
}
