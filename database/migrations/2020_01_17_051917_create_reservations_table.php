<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('rsv_id');
            $table->bigInteger('treat_id');
            $table->string('rsv_code');
            $table->string('rsv_name');
            $table->string('rsv_email');
            $table->string('rsv_phone');
            $table->string('rsv_date');
            $table->string('rsv_time');
            $table->integer('rsv_status');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
