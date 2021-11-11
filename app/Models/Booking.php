<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'bookings';

    public $orderable = [
        'id',
        'unique_key',
        'booked_by',
        'booked_for',
        'table_booked.table_number',
        'specifics',
    ];

    public $filterable = [
        'id',
        'unique_key',
        'booked_by',
        'booked_for',
        'table_booked.table_number',
        'specifics',
    ];

    protected $dates = [
        'booked_for',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'unique_key',
        'booked_by',
        'booked_for',
        'table_booked_id',
        'specifics',
    ];

    public function getBookedForAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setBookedForAttribute($value)
    {
        $this->attributes['booked_for'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function tableBooked()
    {
        return $this->belongsTo(Table::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
