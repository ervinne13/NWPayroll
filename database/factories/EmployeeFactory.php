<?php

use App\Models\MasterFile\Employee;
use App\Models\MasterFile\Policy;
use App\Models\Payroll\TaxCategory;
use App\Models\Setup\Location;
use Carbon\Carbon;
use Faker\Generator as Faker;

/*
  |--------------------------------------------------------------------------
  | Model Factories
  |--------------------------------------------------------------------------
  |
  | This directory should contain each of the model factory definitions for
  | your application. Factories provide a convenient way to generate new
  | model instances for testing / seeding your application's database.
  |
 */

$factory->define(Employee::class, function (Faker $faker) {

    return [
        'code'              => Carbon::now(),
        'location_id'       => Location::all()->random()->id,
        'policy_id'         => Policy::all()->random()->id,
        'tax_category_code' => TaxCategory::all()->random()->code,
        'first_name'        => $faker->firstName,
        'last_name'         => $faker->lastName
    ];
});
