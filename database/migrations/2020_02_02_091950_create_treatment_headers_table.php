<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatment_headers', function (Blueprint $table) {
            $table->bigIncrements('treat_hd_id');
            $table->string('treat_hd_title');
            $table->longText('treat_hd_caption');
            $table->string('treat_hd_image');
            $table->integer('treat_hd_active')->default('0');
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
        Schema::dropIfExists('treatment_headers');
    }
}
