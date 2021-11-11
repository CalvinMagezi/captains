<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'carts';

    public $orderable = [
        'id',
        'product_key.unique_key',
        'product_qty',
        'product_price',
        'user_key',
    ];

    public $filterable = [
        'id',
        'product_key.unique_key',
        'product_qty',
        'product_price',
        'user_key',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'product_key_id',
        'product_qty',
        'product_price',
        'user_key',
    ];

    public function productKey()
    {
        return $this->belongsTo(Product::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
