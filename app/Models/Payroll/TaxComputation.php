<?php

namespace App\Models\Payroll;

use Illuminate\Database\Eloquent\Model;

class TaxComputation extends Model
{

    public $timestamps  = false;
    protected $fillable = ["over_amount", "below_amount", "tax_due", "percent"];

}
