<?php

use App\Models\MasterFile\Policy;
use App\Models\Payroll\Payroll;
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

$factory->define(Payroll::class, function (Faker $faker) {

    $policyIds = array_column(Policy::all()->toArray(), 'id');

    $year       = $faker->randomElement([2015, 2016, 2017, 2018]);
    $releaseDay = $faker->randomElement([15, 30]);
    $month      = rand(1, 12);

    if ($releaseDay == 15 && $month > 1) {
        $cutoffStart = Carbon::create($year, $month - 1, 26, 0, 0, 0);
    } else if ($releaseDay == 15) {
        $cutoffStart = Carbon::create($year - 1, 12, 26, 0, 0, 0);
    } else if ($releaseDay == 30) {
        $cutoffStart = Carbon::create($year, $month, 11, 0, 0, 0);
    }

    while (Carbon::create($year, $month, $releaseDay, 0, 0, 0)->isWeekend()) {
        $releaseDay --;
    }

    return [
        'policy_id'                     => $faker->randomElement($policyIds),
        'release_date'                  => Carbon::create($year, $month, $releaseDay, 0, 0, 0),
        'cutoff_start'                  => $cutoffStart,
        'cutoff_end'                    => Carbon::create($year, $month, $releaseDay == 15 ? 10 : 25, 0, 0, 0),
        'includes_monthly_processables' => $releaseDay == 30,
        'approved_by'                   => $faker->name,
        'received_by'                   => $faker->name,
        'prepared_by'                   => $faker->name
    ];
});
