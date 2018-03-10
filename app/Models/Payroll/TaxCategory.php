<?php

namespace App\Models\Payroll;

use Illuminate\Database\Eloquent\Model;

class TaxCategory extends Model
{

    public $incrementing  = false;
    protected $primaryKey = "code";
    protected $fillable   = [
        "code", "description", "exemption_amount"
    ];

}
