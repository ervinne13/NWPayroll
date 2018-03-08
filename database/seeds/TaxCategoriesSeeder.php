<?php

use App\Models\Payroll\TaxCategory;
use Illuminate\Database\Seeder;

class TaxCategoriesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $taxCategories = [
            ["code" => "HD", "name" => "Head of the family", "exemption_amount" => 50000],
            ["code" => "HF1", "name" => "Head of the family w/ 1 child", "exemption_amount" => 50000],
            ["code" => "HF2", "name" => "Head of the family w/ 2 children", "exemption_amount" => 50000],
            ["code" => "HF3", "name" => "Head of the family w/ 3 children", "exemption_amount" => 50000],
            ["code" => "HF4", "name" => "Head of the family w/ 4 children", "exemption_amount" => 50000],
            ["code" => "M", "name" => "Married", "exemption_amount" => 50000],
            ["code" => "M1", "name" => "Married w/ 1 child", "exemption_amount" => 75000],
            ["code" => "M2", "name" => "Married w/ 2 children", "exemption_amount" => 100000],
            ["code" => "M3", "name" => "Married w/ 3 children", "exemption_amount" => 125000],
            ["code" => "M4", "name" => "Married w/ 4 children", "exemption_amount" => 150000],
            ["code" => "S", "name" => "Single", "exemption_amount" => 0],
        ];

        TaxCategory::insert($taxCategories);
    }

}
