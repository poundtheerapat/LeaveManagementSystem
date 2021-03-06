<?php

use Faker\Generator as Faker;

$factory->define(App\Leave::class, function (Faker $faker) {
    $category_ids = App\Category::all()->pluck('id')->toArray();
    $user_ids = App\User::whereNotNull('supervisor_id')->get()->pluck('id')->toArray();
    $task_ids = App\Task::all()->pluck('id')->toArray();
    $me = $faker->randomElement($user_ids);
    // unset($user_ids[array_search($me, $user_ids)]);
    $user = App\User::find($me);
    if (count($user->subordinates) > 0) {
        $user_ids = $user->subordinates->pluck('id')->toArray();
    } else {
        $user_ids = $user->supervisor->subordinates->pluck('id')->toArray();
    }
    $end_date = $faker->dateTimeThisYear('now');
    $start_date = $faker->dateTimeBetween($end_date->format('Y-m-d H:i:s').' -8 days', $end_date);
    return [
        'user_id' => $me,
        'substitute_id' => $faker->randomElement($user_ids),
        'category_id' => $faker->randomElement($category_ids),
        'task_id' => $faker->randomElement($task_ids),
        'start_date' => $start_date,
        'end_date' => $end_date,
        'status' => $faker->randomElement([
            'new', 'rejected by substitute', 'wait for approval', 'approved', 'rejected', 'cancel'
        ])
    ];
});
