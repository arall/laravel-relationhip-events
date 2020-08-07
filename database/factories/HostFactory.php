<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Host;
use Faker\Generator as Faker;

$factory->define(Host::class, function (Faker $faker) {
    return [
        'ip' => $faker->ipv4,
        'name' => $faker->slug . '.' . $faker->domainName,
    ];
});
