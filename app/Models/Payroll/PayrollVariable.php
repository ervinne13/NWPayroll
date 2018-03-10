<?php

namespace App\Models\Payroll;

use Illuminate\Database\Eloquent\Model;

class PayrollVariable extends Model
{

    protected $fillable = ['code', 'group_code', 'name', 'uom'];

}
