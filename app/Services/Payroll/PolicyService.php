<?php

namespace App\Services\Payroll;

use App\Models\MasterFile\Employee;
use App\Models\MasterFile\Policy;
use Exception;

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

            $hasMapping = array_key_exists($payrollItem->id, $payrollItemAmountMapping);

            if ($payrollItem->requires_employee_amount && !$hasMapping) {
                //  TODO: use a specific exception
                throw new Exception(sprintf('Payroll Item "%s" requires an amount to be applied.', $payrollItem->name));
            }

            if ($hasMapping) {
                $employee->payroll_items()->save($payrollItem, ['amount' => $payrollItemAmountMapping[$payrollItem->id]]);
            } else {
                $employee->payroll_items()->save($payrollItem);
            }
        }
    }

    private function createPayrollItemAmountMapping($payrollItemAmounts)
    {
        $mapping = [];

        foreach ($payrollItemAmounts as $itemAmount) {
            $mapping[$itemAmount['payroll_item_id']] = $itemAmount['amount'];
        }

        return $mapping;
    }

}
