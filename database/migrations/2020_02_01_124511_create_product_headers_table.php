<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_headers', function (Blueprint $table) {
            $table->bigIncrements('prd_hd_id');
            $table->string('prd_hd_title');
            $table->longText('prd_hd_caption');
            $table->string('prd_hd_image');
            $table->integer('prd_hd_active')->default('0');
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
        Schema::dropIfExists('product_headers');
    }
}
