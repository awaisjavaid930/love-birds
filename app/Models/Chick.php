<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Chick extends Model
{
    use HasFactory;
    
    protected $fillable = ['uuid','pair_id','title','ring_no','dob','is_sold','gender','cage_no'];
    
    
    public static function boot()
    {
        parent::boot();
        
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }
}
