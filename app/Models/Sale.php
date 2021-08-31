<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    public $table = 'sales';   

    protected $fillable = [
        'unique_id',
        'handled_by',       
        'kitchen',       
        'mainbar',       
        'cocktailbar',       
        'total',       
    ];
}
