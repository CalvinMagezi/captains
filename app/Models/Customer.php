<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'customers';

    public $orderable = [
        'id',
        'unique_key.unique_key',
        'orders_placed',
        'favorite_drink',
        'favorite_food',
        'favorite_time',
        'favorite_waiter.staff_number',
    ];

    public $filterable = [
        'id',
        'unique_key.unique_key',
        'orders_placed',
        'favorite_drink',
        'favorite_food',
        'favorite_time',
        'favorite_waiter.staff_number',
    ];

    protected $dates = [
        'favorite_time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'unique_key_id',
        'orders_placed',
        'favorite_drink',
        'favorite_food',
        'favorite_time',
        'favorite_waiter_id',
    ];

    public function uniqueKey()
    {
        return $this->belongsTo(User::class);
    }

    public function getFavoriteTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setFavoriteTimeAttribute($value)
    {
        $this->attributes['favorite_time'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function favoriteWaiter()
    {
        return $this->belongsTo(Staff::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
