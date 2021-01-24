<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->increments('product_id');  // increments khoá chính tự tăng 
            $table->integer('category_id');
            $table->text('product_name');
            $table->text('product_desc');
            $table->text('product_content');
            $table->text('product_source');
            $table->text('physical');
            $table->text('product_weight');
            $table->text('product_life');
            $table->text('product_sex');
            $table->string('product_price');
            $table->string('product_image');
            $table->integer('product_status');
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
        Schema::dropIfExists('tbl_product');
    }
}
