<?php

use Faker\Generator as Faker;

/** @var TYPE_NAME $factory */
$factory->define(\App\Models\Profile::class, function (Faker $faker) {
    return [
        'age' => random_int(14, 75),
        'description' => $faker->text,
        'country' => $faker->country,
        'city' => $faker->streetName,
        'street' => $faker->streetName,
        'house' => $faker->buildingNumber,
        'apartment' => random_int(1, 200),
    ];

});

/** @var TYPE_NAME $factory */
$factory
    ->state(\App\Models\User::class, 'with_profiles', [])
    ->afterCreatingState(\App\Models\User::class, 'with_profiles', function ($user, $faker) {
        factory(\App\Models\Profile::class)->create([
            'user_id' => $user->id,
        ]);
    });
