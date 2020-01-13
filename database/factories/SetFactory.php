<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Set;
use App\User;
use Faker\Generator as Faker;

$standardBuys = [
    'Full Buy',
    'Eco Pistol',
    'Force Buy',
    'Double AWP',
    'Single Awp',
    'Single Awp Glass Canon'
];
    


$factory->define(Set::class, function (Faker $faker)  use ($standardBuys) {
    $userIds = User::all()->pluck('id')->toArray();
    return [
        'name' => Arr::random($standardBuys),
        'user_id' => Arr::random($userIds)
    ];
});
