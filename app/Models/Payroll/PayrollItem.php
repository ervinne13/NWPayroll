<?php

namespace App\Models\Payroll;

use Illuminate\Database\Eloquent\Model;

class PayrollItem extends Model
{

    protected $fillable = [
        'name',
        'payslip_name',
        'is_taxable',
        'is_included_in_13th_month',
        'requires_employee_amount',
        'uom',
        'variable_dependent_code',
        'variable_dependency_code',
        'dependency_multiplier'
    ];

    public function generatesVariableValue()
    {
        return $this->variable_dependent_code != null;
    }

    public function dependentPayrollVariable()
    {
        return $this->belongsTo(PayrollVariable::class, 'variable_dependent_code', 'code');
    }

    public function dependencyPayrollVariable()
    {
        return $this->belongsTo(PayrollVariable::class, 'variable_dependency_code', 'code');
    }

}
