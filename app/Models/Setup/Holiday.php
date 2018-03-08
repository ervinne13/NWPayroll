<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{

    protected $fillable = ['type', 'name', 'month', 'day', 'year'];

}
