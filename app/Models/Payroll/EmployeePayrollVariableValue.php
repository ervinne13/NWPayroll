<?php

namespace App\Models\Payroll;

use App\Models\MasterFile\Employee;
use Illuminate\Database\Eloquent\Model;

class EmployeePayrollVariableValue extends Model
{

    public $incrementing = false;
    public $timestamps   = false;
    protected $table     = 'employee_variable_values';

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_code');
    }

    public function payroll_variable()
    {
        return $this->belongsTo(PayrollVariable::class, 'payroll_variable_code');
    }

}
