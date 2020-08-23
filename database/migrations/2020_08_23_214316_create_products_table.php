<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("cid")->default(0);
            $table->string("title");
            $table->string("keyword")->nullable(true);
            $table->longText("desc")->nullable(true);
            $table->longText("remark");
            $table->string("pic",150)->nullable(true);
            $table->integer("tuijian")->default(0);
            $table->integer('views')->default(0);
            $table->string('alt',80);
            $table->text("content");
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
        Schema::dropIfExists('products');
    }
}
