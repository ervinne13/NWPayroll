<?php

namespace App\Models\MasterFile;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $fillable = ['code', 'location_id', 'policy_id', 'tax_category_code', 'first_name', 'last_name'];

}
