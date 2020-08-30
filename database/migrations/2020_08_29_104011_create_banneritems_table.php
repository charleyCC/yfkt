<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanneritemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banneritems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('banner_id')->default(0);
            $table->string('pic',150);
            $table->string('title',60);
            $table->string('digest',150);
            $table->integer('sort')->default(100);
            $table->integer('isshow')->default(1)->comment("1：显示，0：不显示");
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
        Schema::dropIfExists('banneritems');
    }
}
