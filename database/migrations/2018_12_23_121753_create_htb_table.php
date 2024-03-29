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
            $table->integer('amount')->nullable();
            $table->text('mtl')->nullable();
            $table->integer('mtl_vaule')->default(0)->nullable();
            $table->text('donar');
            $table->text('address');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
