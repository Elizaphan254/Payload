<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'slug',
    ];
    
    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
