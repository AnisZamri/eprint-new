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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('custId');     
            $table->string('orderName');
            $table->string('orderPhone');
            $table->string('orderEmail');        
            $table->string('orderAddress');
            $table->float('orderTotalPrice',8,2);
            $table->string('orderStatus');     
            $table->string('paymentMethod');  
            $table->string('trackingNo');   

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
        Schema::dropIfExists('orders');
    }
};

