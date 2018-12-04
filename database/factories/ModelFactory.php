<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
    ];
});

$factory->define(App\Profile::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->safeEmail,
    ];
});

$factory->define(App\Branch::class, function ($faker) {
    return [
        'name' => $faker->unique()->safeEmail,
        'profile_id' => function () {
            return factory(App\Profile::class)->create()->id;
        }
    ];
});