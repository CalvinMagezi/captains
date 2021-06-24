<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    /**
     * The database table used by the model.
     *
     * @var string
     */

    public $table = 'orders';

    protected $dates = [
        'created_at',
        'updated_at',
        'completed_at',
    ];

    protected $fillable = [
        'taken_by',
        'closed_by',
        'status',
        'table_number',
        'items',
        'priority',
        'specifics',
        'quantities',
        'prices',
        'prices_total',
        'amount_received',
        'created_at',
        'updated_at',
        'completed_at',        
    ];

}
