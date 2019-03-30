<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Order::class, function (Faker $faker) {
    return [
        'vacancy_id'=> random_int(1,400),
        'user_id'=> random_int(1,100),
    ];
});
