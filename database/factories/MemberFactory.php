<?php

use Faker\Generator as Faker;

$factory->define(\App\Member::class, function (Faker $faker) {
    $gender = $faker->randomElement([
        'male',
        'female',
    ]);

    return [
        'team_id' => function() {
            return factory(\App\Team::class)->create()->id;
        },
        'firstname' => $faker->firstName($gender),
        'lastname' => $faker->lastName($gender),
        'gender' => $gender,
    ];
});
