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

// Note that Users can be created by the factory but you can't log in with them. Only users originally created with Laravel can be logged in successfully.
$factory->define(App\User::class, function ($faker) {
    return [
        'name'           => $faker->name,
        'email'          => $faker->email,
        'password'       => 'password',
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Project::class, function($faker) {
    return [
        'project_name'        => $faker->firstName,
        'project_type'        => $faker->randomElement($array = array('unsure', 'other', 'webdev')),
        'project_description' => $faker->paragraph($nbSentences = 5),
        'project_budget'      => $faker->numberBetween($min = 300, $max = 2000),
        'project_rate'        => $faker->numberBetween($min = 10, $max = 100),
        'project_timeline'    => $faker->monthName,
        'project_hours'       => $faker->numberBetween($min = 5, $max = 60),
        'project_size'        => $faker->randomElement($array = array('unsure', 'other', 'small')),
        'project_framework'   => $faker->randomElement($array = array('unsure', 'other', 'no', 'bootstrap')),
        'project_theme'       => $faker->randomElement($array = array('unsure', 'other', 'yes', 'no')),
        'project_cms'         => $faker->randomElement($array = array('unsure', 'other', 'no', 'wordpress')),
    ];
});

$factory->define(App\Models\Lead::class, function($faker) {
    return [
        'lead_name'        => $faker->name,
        'lead_company'     => $faker->company,
        'lead_email'       => $faker->email,
        'lead_phone'       => $faker->phoneNumber,
        'lead_address'     => $faker->streetAddress,
        'lead_city'        => $faker->city,
        'lead_state'       => $faker->stateAbbr,
        'lead_zip'         => $faker->postcode,
        'lead_type'        => $faker->randomElement($array = array('individual', 'organization', 'small', 'business', 'government', 'nonprofit')),
        'lead_focus'       => $faker->randomElement($array = array('cheap', 'value', 'results')),
        'lead_involvement' => $faker->randomElement($array = array('unsure', 'yes', 'no')),
        'lead_boss'        => $faker->randomElement($array = array('yes', 'no', 'contact')),
    ];
});
