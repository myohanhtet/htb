<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Artisan;

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
            $table->timestamps();
        });

        Artisan::call('db:seed',[
            '--class'=>'UserSeeder',
        ]);
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
