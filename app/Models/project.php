<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    protected $fillable = [
        'client_id',
        'user_id',
        'city_id',
        'name',
        'description',
        'project_date',
        'status',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }
    public function projectDetails(){
        return $this->hasMany(ProjectDetails::class);
    }
}
