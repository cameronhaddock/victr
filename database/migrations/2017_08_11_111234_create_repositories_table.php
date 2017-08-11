<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepositoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repositories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('repository_id');
            $table->string('name');
            $table->string('owner');
            $table->text('description')->nullable();
            $table->integer('stars');
            $table->string('url');
            $table->dateTimeTz('created');
            $table->dateTimeTz('last_push');
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
        Schema::dropIfExists('repositories');
    }
}
