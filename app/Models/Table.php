<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $table = 'tables';

    protected $fillable = [
        'table_number', 
        'managed_by', 
        'color_code',
        'table_id',
        'section',
        'position',
        'status',      
    ];
}
