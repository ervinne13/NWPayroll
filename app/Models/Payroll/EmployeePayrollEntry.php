<?php

namespace App\Models\Payroll;

use Illuminate\Database\Eloquent\Model;

class EmployeePayrollEntry extends Model
{

    protected $fillable = ['employee_code', 'payroll_item_id', 'date_applied', 'payroll_id', 'qty', 'amount', 'total_amount', 'remarks'];

}
