<?php

namespace App\Models\Payroll;

use Illuminate\Database\Eloquent\Model;

class PayrollItem extends Model
{

    protected $fillable = [
        'name', 'payslip_name', 'is_taxable', 'is_included_in_13th_month', 'requires_employee_amount', 'uom', 'special_holiday_rate', 'regular_holiday_rate'
    ];

}
