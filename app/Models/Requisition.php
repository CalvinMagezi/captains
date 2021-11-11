<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Requisition extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'requisitions';

    public static $search = [
        'name',
    ];

    public $orderable = [
        'id',
        'name',
        'for.unique_key',
        'amount',
        'specifics',
        'latest_date',
        'completed_on',
        'approved_by',
        'approved_on',
    ];

    public $filterable = [
        'id',
        'name',
        'for.unique_key',
        'amount',
        'specifics',
        'latest_date',
        'completed_on',
        'approved_by',
        'approved_on',
    ];

    protected $dates = [
        'latest_date',
        'completed_on',
        'approved_on',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'for_id',
        'amount',
        'specifics',
        'latest_date',
        'completed_on',
        'approved_by',
        'approved_on',
    ];

    public function for()
    {
        return $this->belongsTo(Product::class);
    }

    public function getLatestDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setLatestDateAttribute($value)
    {
        $this->attributes['latest_date'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getCompletedOnAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setCompletedOnAttribute($value)
    {
        $this->attributes['completed_on'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getApprovedOnAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setApprovedOnAttribute($value)
    {
        $this->attributes['approved_on'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
