<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $fillable = [
        'selection',
    ];
    public function companies()   
    {
        return $this->hasMany(Company::class);  
    }
}
