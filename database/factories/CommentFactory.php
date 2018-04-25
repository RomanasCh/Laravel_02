<?php

use Faker\Generator as Faker;

/** @var TYPE_NAME $factory */
$factory->define(\App\Models\Comment::class, function (Faker $faker) {
    return [
        'content' => $faker->text
    ];
});

/** @var TYPE_NAME $factory */
$factory
    ->state(\App\Models\Post::class, 'with_comments', [])
    ->afterCreatingState(\App\Models\Post::class, 'with_comments', function ($post, $faker) {
        factory(\App\Models\Comment::class, random_int(0, 10))->create([
            'post_id' => $post->id,
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
        ]);
    });
