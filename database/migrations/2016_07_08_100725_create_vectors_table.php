<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vectors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vector');
            $table->string('vector_scientific_name');
            $table->string('species');
            $table->string('target_pathogen');
            $table->string('pathogen_scientific_name');
            $table->string('disease');
            $table->text('protocols');
            $table->string('source');
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
        Schema::drop('vectors');
    }
}
