<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\HtbRest;
use Faker\Generator as Faker;

$factory->define(HtbRest::class, function (Faker $faker) {

    return [
        'lucky_no' => $faker->word,
        'amount' => $faker->randomDigitNotNull,
        'mtl' => $faker->text,
        'mtl_vaule' => $faker->randomDigitNotNull,
        'donar' => $faker->text,
        'address' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'win_name' => $faker->word
    ];
});
