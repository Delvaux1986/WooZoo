<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SpecieEnclos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specie_enclosure', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('specie_id')->default(0);
            $table->unsignedBigInteger('enclosure_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specie_enclosure');
    }
}
