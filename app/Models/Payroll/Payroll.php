<?php

namespace App\Models\Payroll;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{

    protected $fillable = ['policy_id', 'release_date', 'cutoff_start', 'cutoff_end', 'includes_monthly_processables', 'approved_by', 'received_by', 'prepared_by'];

}
