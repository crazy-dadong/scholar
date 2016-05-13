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

$factory->define(App\Data\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'is_admin' => mt_rand(0, 1),
        'created_at' => $faker->dateTimeBetween('-15 days', 'now'),
    ];
});

$factory->define(App\Data\Project::class, function (Faker\Generator $faker) {
    return [
        'user_id' => 1,
        'name' => $faker->word,
//        'description' => $faker->paragraphs(mt_rand(3, 6)),

        'description' => $faker->text,
        'created_at' => $faker->dateTimeBetween('-10 days', 'now'),
    ];
});

$factory->define(App\Data\Module::class, function (Faker\Generator $faker) {
    return [
        'user_id' => 1,
        'project_id' => mt_rand(1, 2),
        'name' => $faker->word,
        'description' => $faker->text,
        'created_at' => $faker->dateTimeBetween('-10 days', 'now'),
    ];
});

$factory->define(App\Data\Task::class, function (Faker\Generator $faker) {
    return [
        'user_id' => 1,
        'module_id' => mt_rand(1, 5),
        'name' => $faker->word,
        'description' => $faker->text,
        'plan_started_at' => $faker->dateTimeBetween('-2 days', '+3 days'),
        'plan_end_at' => $faker->dateTimeBetween('-10 days', 'now'),
        'priority' => mt_rand(0, 3),
        'status' => mt_rand(0, 4),
        'created_at' => $faker->dateTimeBetween('-10 days', 'now'),
    ];
});
