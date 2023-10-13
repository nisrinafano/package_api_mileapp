<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class package extends Model
{
    protected $collection = 'package';

    protected $fillable = ['transaction_id', 'customer_name'];
}
