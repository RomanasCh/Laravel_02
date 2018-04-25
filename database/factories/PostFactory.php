<?php

use Faker\Generator as Faker;

/** @var TYPE_NAME $factory */
$factory->define(\App\Models\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'anonymous_comments' => $faker->boolean,
        'content' => $faker->text,
        'slug' => $faker->unique()->slug
    ];
});

/** @var TYPE_NAME $factory */
$factory
    ->state(\App\Models\User::class, 'with_posts', [])
    ->afterCreatingState(\App\Models\User::class, 'with_posts', function ($user, $faker) {
        factory(\App\Models\Post::class, random_int(0, 5))
            ->states('with_comments')
            ->create([
            'user_id' => $user->id, ])
            ->each(function($a) {
                $a->categories()->attach(\App\Models\Category::all()->random(random_int(1, 3)));
            });

    });
