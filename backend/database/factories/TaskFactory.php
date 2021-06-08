<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
       'title'=>$faker->sentence(1),
       'status'=>$faker->boolean() ? 'enable' : 'archivate',
       'isCompleted'=>rand(0, 1),
       'category_id'=>Category::all()->random()->id
    ];
});
