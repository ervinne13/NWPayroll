<?php

namespace App\Models\MasterFile;

use App\Models\Payroll\EmployeePayrollVariableValue;
use App\Models\Payroll\PayrollItem;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    public $incrementing  = false;
    protected $primaryKey = 'code';
    protected $fillable   = ['code', 'location_id', 'policy_id', 'tax_category_code', 'first_name', 'last_name'];

    public function payroll_items()
    {
        return $this
                        ->belongsToMany(PayrollItem::class, 'employee_payroll_items', 'employee_code', 'payroll_item_id')
                        ->withPivot('amount');
    }

    public function payroll_variable_values()
    {
        return $this->hasMany(EmployeePayrollVariableValue::class, 'employee_code');
    }

}
