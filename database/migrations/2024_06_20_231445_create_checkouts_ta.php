<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->unsignedInteger('product_id')->nullable();
            $table->foreign('product_id')->references('product_id')->on('tbl_products')->onDelete('cascade');
            $table->integer('quantity')->nullable();
            $table->double('total_price', 10, 2)->default(0);
            $table->double('shipping_fee')->nullable();
            $table->string('shipping_address')->nullable();
            $table->unsignedInteger('status')->default(0)->default(0);
            $table->unsignedInteger('payment_method')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkouts');
    }
};
