<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    use HasFactory;


    protected $fillable = [
        'package', 'currency', 'lotSize','entryPrice','endPrice','entrytime','endtime','percentage','profitType','tradetype',
    ];

}
