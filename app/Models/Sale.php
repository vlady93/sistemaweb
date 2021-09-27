<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'project_id',
        'user_id',
        'sale_date',
        'total',
        'status',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function project(){
        return $this->belongsTo(project::class);
    }
    public function saleDetails(){
        return $this->hasMany(saleDetails::class);
    }
    public function Movimiento(){
        return $this->hasMany(Movimientos::class);
    }
    
}
