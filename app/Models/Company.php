<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{   
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'name',
        'body',
        'upload_url',
        'user_id',
        'business_id',
        'status_id',
        'calendar_id',
    ];
    public function business()   
    {
        return $this->belongsTo(Business::class);
    }
     
    public function status()   
    {
        return $this->belongsTo(Status::class);
    }
    public function calendar()
    {
        return $this->belongsTo(Calendar::class);
    }
     public function getByLimit()
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('status_id', 'DESC')->get();
    }
 
}
