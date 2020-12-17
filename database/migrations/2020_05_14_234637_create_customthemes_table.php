<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomthemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customthemes', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('banquet_id');

            $table->longText('sofa');
            //$table->string('table');
            //$table->string('stage');
            //$table->string('carpet');
            // $table->string('curtains');
            // $table->string('tables');
            // $table->string('chairs');
            // $table->string('cover');
            // $table->string('jhoomar');
            // $table->string('lighting');
            // $table->string('flowers');
            // $table->string('system');
            // $table->string('eatsystem');
            // $table->string('ventilation');
            // $table->string('fireworks');
            // $table->string('music');
            // $table->string('water');
            // $table->string('desert');
            // $table->string('dinner');
            // $table->string('appetizer');
            // $table->string('drinks');
            
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
        Schema::dropIfExists('customthemes');
    }
}
