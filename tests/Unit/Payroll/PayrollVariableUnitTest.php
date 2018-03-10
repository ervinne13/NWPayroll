<?php

namespace Tests\Unit\Payroll;

use App\Models\MasterFile\Employee;
use App\Models\Payroll\Payroll;
use App\Models\Setup\UOM;
use App\Utilities\QuickCreate;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use function factory;

/**
 * Description of PayrollVariableUnitTest
 *
 * @author Ervinne Sodusta <ervinne.sodusta@nuworks.ph>
 */
class PayrollVariableUnitTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * @test
     */
    public function it_can_generate_payroll_variable_value()
    {
        $this->seed('DatabaseSeeder');

        $create = new QuickCreate();

        $monthlyIncomePV = $create->payrollVariable('TEST_MONTHLY_INCOME', 'INCOME', 'Basic Pay (Monthly)', UOM::MONTH);
        $payrollItem     = $create->payrollItem('Monthly Income', UOM::MONTH, 'TEST_MONTHLY_INCOME', null);

        $policy       = $create->policy('My Policy', [$payrollItem]);
        $payroll      = factory(Payroll::class, 1)->create(['policy_id' => $policy->id])->first();
        $employee     = factory(Employee::class, 1)->create(['policy_id' => $policy->id])->first();
        $payrollEntry = $create->payrollEntry($employee->code, $payrollItem->id, $payroll->id, '1', 15000, 15000); // 15k income

        $this->assertTrue(true);
    }

}
