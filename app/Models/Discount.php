<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public const REPEAT_RADIO = [
        'false' => 'No',
        'true'  => 'Yes',
    ];

    public const HAPPY_HOUR_RADIO = [
        'false' => 'No',
        'true'  => 'Yes',
    ];

    public $table = 'discounts';

    public $orderable = [
        'id',
        'type',
        'status',
        'percentage',
        'start',
        'end',
        'repeat',
        'happy_hour',
    ];

    public $filterable = [
        'id',
        'type',
        'status',
        'percentage',
        'start',
        'end',
        'repeat',
        'happy_hour',
    ];

    protected $dates = [
        'start',
        'end',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'type',
        'status',
        'percentage',
        'start',
        'end',
        'repeat',
        'happy_hour',
    ];

    public function getStartAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setStartAttribute($value)
    {
        $this->attributes['start'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getEndAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setEndAttribute($value)
    {
        $this->attributes['end'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getRepeatLabelAttribute($value)
    {
        return static::REPEAT_RADIO[$this->repeat] ?? null;
    }

    public function getHappyHourLabelAttribute($value)
    {
        return static::HAPPY_HOUR_RADIO[$this->happy_hour] ?? null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
