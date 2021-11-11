<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sms extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'sms';

    public $orderable = [
        'id',
        'placed_by',
        'unique_key',
        'keyword.sms_keyword',
        'time',
        'table.table_number',
        'requested_waiter.staff_number',
    ];

    public $filterable = [
        'id',
        'placed_by',
        'unique_key',
        'keyword.sms_keyword',
        'time',
        'table.table_number',
        'requested_waiter.staff_number',
    ];

    protected $dates = [
        'time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'placed_by',
        'unique_key',
        'keyword_id',
        'time',
        'table_id',
        'requested_waiter_id',
    ];

    public function keyword()
    {
        return $this->belongsTo(Product::class);
    }

    public function getTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setTimeAttribute($value)
    {
        $this->attributes['time'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function requestedWaiter()
    {
        return $this->belongsTo(Staff::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
