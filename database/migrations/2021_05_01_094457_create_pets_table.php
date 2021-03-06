<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('specie_id')->default(0);
            $table->unsignedBigInteger('user_id');         
            $table->string('name', 20);
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->time('lunchtime')->nullable();
            $table->string('special_diet')->nullable();
            $table->boolean('feeds')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pets');
    }
}
