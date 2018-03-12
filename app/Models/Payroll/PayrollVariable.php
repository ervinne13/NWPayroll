<?php

namespace App\Models\Payroll;

use Illuminate\Database\Eloquent\Model;

class PayrollVariable extends Model
{

    public $incrementing = false;
    protected $primary   = 'code';
    protected $fillable  = ['code', 'group_code', 'name', 'uom'];

}
