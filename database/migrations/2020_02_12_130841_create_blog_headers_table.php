<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_headers', function (Blueprint $table) {
            $table->bigIncrements('blog_hd_id');
            $table->string('blog_hd_title');
            $table->longText('blog_hd_caption');
            $table->string('blog_hd_image');
            $table->integer('blog_hd_active')->default('0');
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
        Schema::dropIfExists('blog_headers');
    }
}
