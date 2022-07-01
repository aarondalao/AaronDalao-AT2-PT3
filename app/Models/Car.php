<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $collection = 'cars';

    protected $fillable = [
        'code',
        'manufacturer',
        'model',
        'price',
    ];

    protected $hidden= [];

    protected $casts = [];
}
