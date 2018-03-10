<?php

use App\Models\Payroll\PayrollItem;
use App\Models\Setup\UOM;
use Illuminate\Database\Seeder;

class NuWorksPayrollItemsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mainEarningsEmployeeAmount = [
            ['INCOME_MON', 'Basic Pay', 'Monthly Income', true, UOM::MONTH, 1],
            ['INCOME_DAY', 'Basic Pay', 'Daily Income', true, UOM::DAY, 1],
            [NULL, 'Demininis', 'Demininis', false, UOM::MONTH, 1],
            [NULL, 'Allowance', 'Cost of Living Allowance', false, UOM::MONTH, 1],
            [NULL, 'Allowance', 'Taxable Monthly Allowance', true, UOM::MONTH, 1],
            [NULL, '13th Month', '13th Month', true, UOM::EXACT, 1],
            [NULL, 'Bonus', 'Other Bonus', true, UOM::EXACT, 1],
        ];

        foreach ($mainEarningsEmployeeAmount as $payrollItemAssoc) {
            $payrollItem = new PayrollItem([
                'system_generated_code' => $payrollItemAssoc[0],
                'payslip_name'          => $payrollItemAssoc[1],
                'name'                  => $payrollItemAssoc[2],
                'is_taxable'            => $payrollItemAssoc[3],
                'uom'                   => $payrollItemAssoc[4],
                'special_holiday_rate'  => $payrollItemAssoc[4],
                'regular_holiday_rate'  => $payrollItemAssoc[4],
            ]);
        }
    }

}
