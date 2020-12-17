<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerbookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customerbookings', function (Blueprint $table) {
            $table->integer('id')->unique();


            $table->integer('banquet_id');
           
            $table->integer('customer_id');
           
            $table->longText('pics');

            $table->longText('bill');
            
            $table->integer('total');
           
            $table->date('date');
            
            $table->time('starttime');
            
            $table->time('endtime');

           
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
        Schema::dropIfExists('customerbookings');
    }
}
