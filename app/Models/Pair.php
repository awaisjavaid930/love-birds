<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pair extends Model
{
    use HasFactory;
    
    protected $fillable = ['uuid','title','cage_no','male_ring','female_ring','is_sold','user_id'];
    
    
    public static function boot()
    {
        parent::boot();
        
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }
}
