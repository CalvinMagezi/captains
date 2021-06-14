<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'unique_id',
        'description',
        'image',
        'barcode',
        'price',
        'quantity',
        'hprice',
        'status',
        'details',       
        'category',
        'major_category',
    ];
}
