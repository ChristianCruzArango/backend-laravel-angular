<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuperHeroesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('super_heroes', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->unsignedInteger('actor_id');
            $table->foreign('actor_id')->references('id')->on('actors');
            $table->string('house');
            $table->string('image');
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
        Schema::dropIfExists('super_heroes');
    }
}
