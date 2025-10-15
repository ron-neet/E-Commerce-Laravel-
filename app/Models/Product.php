<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $fillable = [
        'name',
        'price',
        'category',
        'description',
        'images', // make sure this matches the column name in your DB
    ];
}
