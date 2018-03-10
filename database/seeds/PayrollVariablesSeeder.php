<?php

use App\Models\Payroll\PayrollVariable;
use App\Models\Setup\UOM;
use Illuminate\Database\Seeder;

class PayrollVariablesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $variables = [
            ['INCOME_MONTH', 'INCOME', 'Income Per Month', UOM::MONTH],
            ['INCOME_DAY', 'INCOME', 'Income Per Day', UOM::DAY],
            ['INCOME_HOUR', 'INCOME', 'Income Per Hour', UOM::HOUR],
            ['INCOME_MINUTE', 'INCOME', 'Income Per Minute', UOM::MINUTE],
            ['OVERTIME', 'OVERTIME', 'Overtime', UOM::MINUTE],
        ];

        foreach ($variables as $variableAssoc) {
            PayrollVariable::insert([
                'code'       => $variableAssoc[0],
                'group_code' => $variableAssoc[1],
                'name'       => $variableAssoc[2],
                'uom'        => $variableAssoc[3],
            ]);
        }
    }

}
