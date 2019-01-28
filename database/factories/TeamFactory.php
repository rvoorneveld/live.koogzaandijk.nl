<?php

use Faker\Generator as Faker;

$factory->define(\App\Team::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'club_id' => function() {
            return factory(\App\Club::class)->create()->id;
        }
    ];
});
