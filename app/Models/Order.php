<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'orders';

    public $orderable = [
        'id',
        'unique_key',
        'status',
        'taken_by',
        'closed_by',
        'table_number',
        'extra_notes',
        'total_amount',
        'amount_received',
        'completed_at',
    ];

    public $filterable = [
        'id',
        'unique_key',
        'status',
        'taken_by',
        'closed_by',
        'table_number',
        'extra_notes',
        'total_amount',
        'amount_received',
        'completed_at',
    ];

    protected $dates = [
        'completed_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'unique_key',
        'status',
        'taken_by',
        'closed_by',
        'table_number',
        'extra_notes',
        'total_amount',
        'amount_received',
        'completed_at',
    ];

    public function getCompletedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setCompletedAtAttribute($value)
    {
        $this->attributes['completed_at'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
