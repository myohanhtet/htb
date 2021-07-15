<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePathanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pathan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('amount')->nullable();
            $table->string('material')->nullable();
            $table->integer('amount_mtl')->nullable();
            $table->string('doner');
            $table->string('address');
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
        Schema::dropIfExists('pathan');
    }
}
