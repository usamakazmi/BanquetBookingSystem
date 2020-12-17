<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            
            $table->integer('banquet_id');

            $table->string('sofa')->nullable();
            $table->string('table')->nullable();
            $table->string('stage')->nullable();
            $table->string('carpet')->nullable();
            
            $table->string('curtains')->nullable();
            $table->string('tables')->nullable();
            $table->string('chairs')->nullable();
            $table->string('cover')->nullable();
            $table->string('jhoomar')->nullable();
            $table->string('lighting')->nullable();
            $table->string('flowers')->nullable();
            $table->string('system')->nullable();
            $table->string('eatsystem')->nullable();
            $table->string('ventilation')->nullable();
            $table->string('fireworks')->nullable();
            $table->string('music')->nullable();
            $table->string('water')->nullable();
            $table->string('desert')->nullable();
            $table->string('dinner')->nullable();
            $table->string('appetizer')->nullable();
            $table->string('drinks')->nullable();
            
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
        Schema::dropIfExists('themes');
    }
}
