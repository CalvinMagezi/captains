<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HappyHour extends Model
{
    use HasFactory;

    public $table = 'happy_hours';   

    protected $fillable = [
        'start',
        'end'       
    ];
}
