<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tests\Unit\Payroll;

use App\Models\MasterFile\Employee;
use App\Models\MasterFile\Policy;
use App\Models\Payroll\PayrollItem;
use App\Models\Setup\UOM;
use App\Services\Payroll\PolicyService;
use App\Utilities\QuickCreate;
use DefaultSetupSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\App;
use TaxCategoriesSeeder;
use TaxComputationSeeder;
use Tests\TestCase;
use function factory;

/**
 * Description of PolicyServiceUnitTest
 *
 * @author Ervinne Sodusta <ervinne.sodusta@nuworks.ph>
 */
class PolicyServiceUnitTest extends TestCase
{

    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();

        $this->seed(DefaultSetupSeeder::class);
        $this->seed(TaxCategoriesSeeder::class);
        $this->seed(TaxComputationSeeder::class);
    }

    /**
     * @test
     */
    public function it_can_assign_payroll_items_to_policy()
    {
        $policy       = factory(Policy::class, 1)->create()->first();
        $payrollItems = factory(PayrollItem::class, 5)->create(['requires_employee_amount' => false]);

        $policy->payroll_items()->sync($payrollItems);

        $this->assertCount(count($payrollItems), $policy->payroll_items);
    }

    /**
     * @test
     */
    public function it_can_assign_policy_to_employee_without_required_amounts()
    {
        $policy       = factory(Policy::class, 1)->create()->first();
        $payrollItems = factory(PayrollItem::class, 5)->create(['requires_employee_amount' => false]);

        $policy->payroll_items()->sync($payrollItems);

        $employee = factory(Employee::class, 1)->create(['policy_id' => $policy->id])->first();

        $service = App::make(PolicyService::class);
        $service->applyToEmployee($policy->id, $employee->code);

        $this->assertCount(count($payrollItems), $employee->payroll_items);
    }

    /**
     * @test
     */
    public function it_can_assign_policy_to_employee_with_required_amounts()
    {
        $policy       = factory(Policy::class, 1)->create()->first();
        $payrollItems = factory(PayrollItem::class, 5)->create(['requires_employee_amount' => true]);

        $policy->payroll_items()->sync($payrollItems);

        $employee = factory(Employee::class, 1)->create(['policy_id' => $policy->id])->first();

        $amounts = [];
        foreach ($payrollItems as $payrollItem) {
            $amounts[] = ['payroll_item_id' => $payrollItem->id, 'amount' => rand(100, 999)];
        }

        $service = App::make(PolicyService::class);
        $service->applyToEmployee($policy->id, $employee->code, $amounts);

        $this->assertCount(count($payrollItems), $employee->payroll_items);

        foreach ($amounts as $payrollItemAmount) {
            foreach ($employee->payroll_items as $employeePayrollItem) {
                if ($employeePayrollItem->id == $payrollItemAmount['payroll_item_id']) {
                    $this->assertEquals($payrollItemAmount['amount'], $employeePayrollItem->pivot->amount);
                    break;
                }
            }
        }
    }

    /**
     * @test
     */
    public function it_can_generate_payroll_variable_values()
    {
        $create = new QuickCreate();

        $create->payrollVariable('TEST_MONTHLY_INCOME', 'INCOME', 'Basic Pay (Monthly)', UOM::MONTH);
        $payrollItem = $create->payrollItem('Monthly Income', UOM::MONTH, 'TEST_MONTHLY_INCOME', null);

        $policy   = $create->policy('My Policy', [$payrollItem]);
        $employee = factory(Employee::class, 1)->create(['policy_id' => $policy->id])->first();

        $amounts = [
            ['payroll_item_id' => $payrollItem->id, 'amount' => rand(100, 999)]
        ];

        $service = App::make(PolicyService::class);
        $service->applyToEmployee($policy->id, $employee->code, $amounts);

        $this->assertTrue(count($employee->payroll_variable_values) > 0);
        $this->assertEquals($amounts[0]['amount'], $employee->payroll_variable_values[0]->value);
    }

    /**
     * TODO: This will generate payroll variable values for variables under the
     * same group but with different units of measurement
     */
    public function it_can_generate_cascaded_payroll_variable_values()
    {
        
    }

    //  Negative Tests
    //  ========================================================================

    /**
     * @test
     * 
     */
    public function it_fails_when_attempting_to_apply_payroll_items_with_required_amount_without_amount()
    {
        $policy       = factory(Policy::class, 1)->create()->first();
        $payrollItems = factory(PayrollItem::class, 1)->create([
            'name'                     => 'Test Payroll Item',
            'requires_employee_amount' => true
        ]);

        $policy->payroll_items()->sync($payrollItems);

        $employee = factory(Employee::class, 1)->create(['policy_id' => $policy->id])->first();

        $service = App::make(PolicyService::class);

        $this->expectExceptionMessage('Payroll Item "Test Payroll Item" requires an amount to be applied.');
        $service->applyToEmployee($policy->id, $employee->code);    //  throws the expected exception
    }

}
