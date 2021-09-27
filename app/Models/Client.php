<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable =[
        'name','ap_paterno','ap_materno','genero','ci','nit','address','phone','email',
    ];
}
