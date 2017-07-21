<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations',function(Blueprint $table){
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('address',1000)->nullable();
            $table->string('phone',1000)->nullable();
            $table->string('email')->nullable();
            $table->string('working_time')->nullable();
            $table->string('map_embed_src')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
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
        Schema::dropIfExists('locations');
    }
}
