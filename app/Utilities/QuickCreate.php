<?php

namespace App\Utilities;

use App\Models\MasterFile\Policy;
use App\Models\Payroll\EmployeePayrollEntry;
use App\Models\Payroll\Payroll;
use App\Models\Payroll\PayrollItem;
use App\Models\Payroll\PayrollVariable;
use Illuminate\Support\Carbon;

/**
 * Description of QuickCreate
 *
 * @author Ervinne Sodusta <ervinne.sodusta@nuworks.ph>
 */
class QuickCreate
{

    public function policy($name, $payrollItems)
    {
        $policy = new Policy(['name' => $name]);
        $policy->save();

        $policy->payroll_items()->saveMany($payrollItems);

        return $policy;
    }

    public function payroll($policyId, $releaseDate, $cutoffStartDate, $cutoffEndDate, $includesMonthlyProcessables = false)
    {
        $payroll = new Payroll([
            'policy_id'                     => $policyId,
            'release_date'                  => $releaseDate,
            'cutoff_start'                  => $cutoffStartDate,
            'cutoff_end'                    => $cutoffEndDate,
            'includes_monthly_processables' => $includesMonthlyProcessables,
            'approved_by'                   => null,
            'received_by'                   => null,
            'prepared_by'                   => null
        ]);

        $payroll->save();
        return $payroll;
    }

    public function payrollVariable($code, $groupCode, $name, $uom)
    {
        $variable = new PayrollVariable([
            'code'       => $code,
            'group_code' => $groupCode,
            'name'       => $name,
            'uom'        => $uom,
        ]);

        $variable->save();
        return $variable;
    }

    public function payrollItem($name, $uom, $variableDependentCode, $variableDependencyCode, $dependencyMultiplier = 1)
    {
        $payrollItem = new PayrollItem([
            'is_system_generated'       => true,
            'is_active'                 => true,
            'name'                      => $name,
            'payslip_name'              => $name,
            'is_taxable'                => true,
            'is_included_in_13th_month' => true,
            'requires_employee_amount'  => true,
            'uom'                       => $uom,
            'variable_dependent_code'   => $variableDependentCode,
            'variable_dependency_code'  => $variableDependencyCode,
            'dependency_multiplier'     => $dependencyMultiplier,
        ]);

        $payrollItem->save();
        return $payrollItem;
    }

    public function payrollEntry($employeeCode, $payrollItemId, $payrollId, $qty, $amount, $totalAmount)
    {
        $payrollEntry = new EmployeePayrollEntry([
            'employee_code'   => $employeeCode,
            'payroll_item_id' => $payrollItemId,
            'date_applied'    => Carbon::now(),
            'payroll_id'      => $payrollId,
            'qty'             => $qty,
            'amount'          => $amount,
            'total_amount'    => $totalAmount,
            'remarks'         => null
        ]);

        $payrollEntry->save();
        return $payrollEntry;
    }

}
