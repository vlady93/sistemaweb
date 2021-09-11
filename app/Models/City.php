<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class City extends Model
{
    protected $fillable =[
        'name','description',
    ];

    public function products(){
        return $this->hasMany(Project::class);
    }
}
