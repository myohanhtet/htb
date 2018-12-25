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
            $table->integer('amount');
            $table->text('mtl')->nullable();
            $table->integer('mtl_vaule')->default(0);
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
