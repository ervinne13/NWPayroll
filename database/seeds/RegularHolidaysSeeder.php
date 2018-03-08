<?php

use App\Models\Setup\Holiday;
use Illuminate\Database\Seeder;

class RegularHolidaysSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regularHolidays = [
            [1, 1, "New Year's Day"],
            [5, 1, "Labor Day"],
            [6, 12, "Independence Day"],
            [12, 25, "Christmas Day"],
            [12, 30, "Rizal Day"],
        ];

        $specialHolidays = [
            [11, 1, "All Saints Day"],
            [11, 30, "Bonifacio Day"],
            [12, 24, "Christmas Eve"],
            [12, 31, "New Year's Eve"],
        ];

        foreach ($regularHolidays as $regularHoliday) {
            Holiday::insert([
                'type'  => 'reg',
                'name'  => $regularHoliday[2],
                'month' => $regularHoliday[0],
                'day'   => $regularHoliday[1],
                'year'  => 0,
            ]);
        }

        foreach ($specialHolidays as $specialHoliday) {
            Holiday::insert([
                'type'  => 'reg',
                'name'  => $specialHoliday[2],
                'month' => $specialHoliday[0],
                'day'   => $specialHoliday[1],
                'year'  => 0,
            ]);
        }
    }

}
