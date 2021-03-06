<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('species', function (Blueprint $table) {
            $table->id();
            $table->string('specie')->nullable();
            $table->string('family')->nullable();
            $table->string('food_type')->nullable();
            $table->boolean('feedSpecie')->nullable()->default(0);
            $table->time('lunchtime')->nullable();
            $table->boolean('feedSpecieTwo')->nullable()->default(0);
            $table->time('lunchtimeTwo')->nullable();
            $table->time('lunchtimeThree')->nullable();
            $table->integer('enclosure_id')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('species');
    }
}
