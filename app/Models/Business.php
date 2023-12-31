<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'industry_id',
    ];
    public function companies()   
    {
        return $this->hasMany(Company::class);  
    }
    public function industry()   
    {
        return $this->belongsTo(Industry::class);  
    }
}
