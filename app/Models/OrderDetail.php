<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public const READY_RADIO = [
        'true'  => 'Yes',
        'false' => 'No',
    ];

    public $table = 'order_details';

    public $orderable = [
        'id',
        'order_key.unique_key',
        'product_key.unique_key',
        'quantity',
        'unit_price',
        'amount',
        'discount',
        'dispatched_to',
        'ready',
        'specifics',
        'priority',
    ];

    public $filterable = [
        'id',
        'order_key.unique_key',
        'product_key.unique_key',
        'quantity',
        'unit_price',
        'amount',
        'discount',
        'dispatched_to',
        'ready',
        'specifics',
        'priority',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'order_key_id',
        'product_key_id',
        'quantity',
        'unit_price',
        'amount',
        'discount',
        'dispatched_to',
        'ready',
        'specifics',
        'priority',
    ];

    /**
     * The list of Order Details
     *
     * @return void
     */
    public static function orderDetailsList(){
        $order_details = OrderDetail::all();
        return ($order_details);
    }

    /**
     * Grab latest Order Details
     *
     * @return void
     */
    public static function latestDetails(){
        $lastID = OrderDetail::max('order_key_id');
        $order_receipt = OrderDetail::where('order_key_id', $lastID)->get();
        return($order_receipt);
    }

    public static function receiptDetails($id){
        $order_receipt = OrderDetail::where('order_key_id', $id)->get();
        return($order_receipt);
    }

    public function orderKey()
    {
        return $this->belongsTo(Order::class);
    }

    public function productKey()
    {
        return $this->belongsTo(Product::class);
    }

    public function getReadyLabelAttribute($value)
    {
        return static::READY_RADIO[$this->ready] ?? null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
