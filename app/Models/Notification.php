<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public const COMPLETED_RADIO = [
        'false' => 'No',
        'true'  => 'Yes',
    ];

    public $table = 'notifications';

    public $orderable = [
        'id',
        'unique_key',
        'for',
        'from',
        'purpose',
        'time',
        'completed',
        'message',
    ];

    public $filterable = [
        'id',
        'unique_key',
        'for',
        'from',
        'purpose',
        'time',
        'completed',
        'message',
    ];

    protected $dates = [
        'time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'unique_key',
        'for',
        'from',
        'purpose',
        'time',
        'completed',
        'message',
    ];

    public function getTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setTimeAttribute($value)
    {
        $this->attributes['time'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getCompletedLabelAttribute($value)
    {
        return static::COMPLETED_RADIO[$this->completed] ?? null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
