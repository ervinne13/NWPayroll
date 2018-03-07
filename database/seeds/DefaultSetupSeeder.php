<?php

use Illuminate\Database\Seeder;

class DefaultSetupSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nuworks = new Company(['name' => 'NuWorks Interactive Labs Inc.']);
        $nuworks->save();

        $nuworksOffice             = new Location(['name' => 'NuWorks Office']);
        $nuworksOffice->company_id = $nuworks->id;
        $nuworksOffice->save();
    }

}
