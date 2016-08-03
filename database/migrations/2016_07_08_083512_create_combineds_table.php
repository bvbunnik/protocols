<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombinedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combineds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('host_species');
            $table->string('diagnosis');
            $table->string('disease');
            $table->string('pathogen_type');
            $table->string('pathogen_species');
            $table->text('protocols');
            $table->string('source');
            $table->string('comments');
            $table->string('notifiable');
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
        Schema::drop('combineds');
    }
}
