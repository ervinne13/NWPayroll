<?php

use App\Models\Payroll\PayrollItem;
use App\Models\Setup\UOM;
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

$factory->define(PayrollItem::class, function (Faker $faker) {

    $name = $faker->unique()->word;

    return [
        'is_system_generated'       => true,
        'is_active'                 => true,
        'name'                      => $name,
        'payslip_name'              => $name,
        'is_taxable'                => $faker->randomElement([true, false]),
        'is_included_in_13th_month' => $faker->randomElement([true, false]),
        'requires_employee_amount'  => $faker->randomElement([true, false]),
        'uom'                       => $faker->randomElement(UOM::getList()),
        'variable_dependent_code'   => null,
        'variable_dependency_code'  => null,
        'dependency_multiplier'     => 1,
    ];
});
