<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDetails extends Model
{
    protected $fillable = [
        'project_id',
        'user_id',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
   
}
