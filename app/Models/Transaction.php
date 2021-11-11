<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'transactions';

    public $orderable = [
        'id',
        'order_key',
        'paid_amount',
        'balance',
        'payment_method',
        'handled_by.name',
        'transac_date',
        'transac_amount',
    ];

    public $filterable = [
        'id',
        'order_key',
        'paid_amount',
        'balance',
        'payment_method',
        'handled_by.name',
        'transac_date',
        'transac_amount',
    ];

    protected $dates = [
        'transac_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'order_key',
        'paid_amount',
        'balance',
        'payment_method',
        'handled_by_id',
        'transac_date',
        'transac_amount',
    ];

    public function handledBy()
    {
        return $this->belongsTo(User::class);
    }

    public function getTransacDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setTransacDateAttribute($value)
    {
        $this->attributes['transac_date'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
