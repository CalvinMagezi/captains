<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
     /**
     * The database table used by the model.
     *
     * @var string
     */

    public $table = 'order_details';

    protected $dates = [
        'created_at',
        'updated_at',
        'completed_at',
    ];

    protected $fillable = [
        'order_id',
        'taken_by',        
        'table_number',
        'item_name',
        'item_category',
        'item_m_category',
        'priority',
        'specifics',
        'quantity',
        'price',       
        'created_at',
        'updated_at',
        'completed_at',        
    ];
}
