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
use App\Services\Payroll\PolicyService;
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
        $this->seed(DefaultSetupSeeder::class);
        $this->seed(TaxCategoriesSeeder::class);
        $this->seed(TaxComputationSeeder::class);

        $policy       = factory(Policy::class, 1)->create()->first();
        $payrollItems = factory(PayrollItem::class, 5)->create(['requires_employee_amount' => false]);

        $policy->payroll_items()->sync($payrollItems);

        $employee = factory(Employee::class, 1)->create(['policy_id' => $policy->id])->first();

        $service = App::make(PolicyService::class);
        $service->applyToEmployee($policy->id, $employee->code);

        $this->assertCount(count($payrollItems), $employee->payroll_items);
    }

}
