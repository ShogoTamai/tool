<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'summary',
        'start',
        'end',
    ];
    public $timestamps = false;
    public function companies()   
    {
        return $this->hasMany(Company::class);  
    }
}
