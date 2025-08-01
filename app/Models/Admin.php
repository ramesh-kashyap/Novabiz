<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table='admins';
    protected $guard = 'admin';

   public static function return_by_dynamic($data) {
        return Admin::where($data['dynamic_column'], $data['dynamic_value'])->select('*')->first();
    }

}
