<?php

namespace App\Services\Payroll;

use App\Models\MasterFile\Employee;
use App\Models\Payroll\PayrollItem;

/**
 * Description of PayrollEntryVariableValueGenerator
 *
 * @author Ervinne Sodusta <ervinne.sodusta@nuworks.ph>
 */
class PayrollEntryVariableValueGenerator
{

    public function generateEmployeePayrollVariables($employeeCode)
    {
        $employee = Employee::findOrFail($employeeCode);

        $rawVariableValues = [];
        $payrollItems      = $employee->payroll_items;

        foreach ($payrollItems as $payrollItem) {
            //  check if any of the payroll items can generate variables
            if ($payrollItem->variable_dependent_code) {
                $this->generateVariableValue($payrollItem, $employee);
            }
        }

        return $employee->payroll_variable_values;
    }

    private function generateVariableValue(PayrollItem $payrollItem, Employee $employee)
    {
        
    }

}
