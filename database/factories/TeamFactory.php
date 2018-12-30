<?php

use Faker\Generator as Faker;

$factory->define(\App\Team::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'club_id' => $faker->numberBetween(1, 9),
    ];
});
