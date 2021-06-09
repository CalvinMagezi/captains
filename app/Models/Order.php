<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

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
        'deleted_at',
    ];

    protected $fillable = [
        'taken_by',
        'status',
        'table_number',
        'item_name',
        'priority',
        'specifics',
        'created_at',
        'updated_at',
        'deleted_at',
        'customer_name',
        'customer_email',
    ];

    public function products()
    {
        return $this->belongsToMany(Item::class)->withPivot(['quantity']);
    }
}
