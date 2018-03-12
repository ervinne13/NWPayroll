<?php

namespace App\Services\Payroll;

use App\Models\MasterFile\Employee;
use App\Models\MasterFile\Policy;
use App\Models\Payroll\EmployeePayrollVariableValue;
use App\Models\Payroll\PayrollItem;
use Carbon\Carbon;
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

        $this->generateEmployeePayrollVariables($employeeCode);
    }

    public function generateEmployeePayrollVariables($employeeCode)
    {
        $employee     = Employee::findOrFail($employeeCode);
        $payrollItems = $employee->payroll_items;

        foreach ($payrollItems as $payrollItem) {
            //  check if any of the payroll items can generate variables
            if ($payrollItem->generatesVariableValue()) {
                $this->generateVariableValue($payrollItem, $employee);
            }
        }

        return $employee->payroll_variable_values;
    }

    private function generateVariableValue(PayrollItem $payrollItem, Employee $employee)
    {

        $payrollVariableValue = new EmployeePayrollVariableValue();

        $payrollVariableValue->employee_code         = $employee->code;
        $payrollVariableValue->payroll_variable_code = $payrollItem->dependentPayrollVariable->code;
        $payrollVariableValue->date_applied          = Carbon::now();
        $payrollVariableValue->value                 = $payrollItem->pivot->amount;

        //  TODO cascade amount to other payroll variables

        $payrollVariableValue->save();
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
