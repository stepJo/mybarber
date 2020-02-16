<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_messages', function (Blueprint $table) {
            $table->bigIncrements('rsv_msg_id');
            $table->string('rsv_msg_status');
            $table->string('rsv_msg_name')->nullable();
            $table->longText('rsv_msg_subject')->nullable();
            $table->longText('rsv_msg_content')->nullable();
            $table->longText('rsv_msg_footer')->nullable();
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
        Schema::dropIfExists('reservation_messages');
    }
}
