<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsPageMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_page_media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cms_page_id');
            $table->string('type');
            $table->string('media');
            $table->timestamps();

            $table->foreign('cms_page_id')->references('id')->on('cms_pages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cms_page_media');
    }
}
