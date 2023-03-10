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
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('orderId');    
            $table->foreign('orderId')->references('id')->on('orders')->onDelete('cascade'); 
            $table->unsignedBigInteger('subProductId');
            $table->string('orderProduct');
            $table->string('orderQuantity');
            $table->float('orderPrice',8,2);
            $table->string('orderDesign');   

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
        Schema::dropIfExists('order_products');
    }
};


