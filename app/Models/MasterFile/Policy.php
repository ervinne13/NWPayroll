<?php

namespace App\Models\MasterFile;

use App\Models\Payroll\PayrollItem;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{

    protected $fillable = ['name'];

    public function payroll_items()
    {
        return $this->belongsToMany(PayrollItem::class, 'policy_payroll_items', 'policy_id', 'payroll_item_id');
    }

}
