<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHtbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('htb', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lucky_no')->nullable();
            $table->string('amount');
            $table->text('mtl');
            $table->string('mtl_vaule');
            $table->text('donar');
            $table->text('address');
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
        Schema::dropIfExists('htb');
    }
}