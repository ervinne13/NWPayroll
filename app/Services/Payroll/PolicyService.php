<?php

namespace App\Services\Payroll;

use App\Models\MasterFile\Employee;
use App\Models\MasterFile\Policy;

/**
 * Description of PolicyService
 *
 * @author Ervinne Sodusta <ervinne.sodusta@nuworks.ph>
 */
class PolicyService
{

    public function applyToEmployee($policyId, $employeeCode, $payrollItemAmounts = [])
    {
        $policy   = Policy::with('payroll_items')->findOrFail($policyId);
        $employee = Employee::findOrFail($employeeCode);

        $payrollItemAmountMapping = $this->createPayrollItemAmountMapping($payrollItemAmounts);

        $employee->payroll_items()->detach();
        foreach ($policy->payroll_items as $payrollItem) {

            if (array_key_exists($payrollItem->id, $payrollItemAmountMapping)) {
                $employee->payroll_items()->save($payrollItem, ['amount' => $payrollItemAmountMapping[$payrollItem->id]]);
            } else {
                $employee->payroll_items()->save($payrollItem);
            }
        }
    }

    private function createPayrollItemAmountMapping($payrollITemAmounts)
    {
        //  TODO:
        return $payrollITemAmounts;
    }

}
