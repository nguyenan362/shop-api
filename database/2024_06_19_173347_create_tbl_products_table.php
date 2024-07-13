<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tbl_products', function (Blueprint $table) {
            $table->increments('product_id');
            $table->unsignedInteger('cate_id');
            $table->foreign('cate_id')->references('cate_id')->on('tbl_category_products')->onDelete('cascade');
            $table->unsignedInteger('brand_id');
            $table->foreign('brand_id')->references('brand_id')->on('tbl_brands')->onDelete('cascade');
            $table->string('product_name');
            $table->string('product_price');
            $table->string('product_desc');
            $table->string('product_image');
            $table->integer('product_status');
            $table->string('product_content');
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
        //
    }
};
