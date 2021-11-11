<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public const CASUALS_ASSIGNED_SELECT = [
        'name' => 'Name',
    ];

    public const TABLES_IN_CHARGE_OF_SELECT = [
        'table_number' => 'TableNumber',
    ];

    public $table = 'staff';

    public static $search = [
        'color_code',
    ];

    public $orderable = [
        'id',
        'staff_number',
        'user_key.unique_key',
        'tables_in_charge_of',
        'casuals_assigned',
        'color_code',
        'clocked_in',
        'clocked_out',
    ];

    public $filterable = [
        'id',
        'staff_number',
        'user_key.unique_key',
        'tables_in_charge_of',
        'casuals_assigned',
        'color_code',
        'clocked_in',
        'clocked_out',
    ];

    protected $dates = [
        'clocked_in',
        'clocked_out',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'staff_number',
        'user_key_id',
        'tables_in_charge_of',
        'casuals_assigned',
        'color_code',
        'clocked_in',
        'clocked_out',
    ];

    public static function staffList(){
        $staff = Staff::all();
        return $staff;
    }

    public function userKey()
    {
        return $this->belongsTo(User::class);
    }

    public function getTablesInChargeOfLabelAttribute($value)
    {
        return static::TABLES_IN_CHARGE_OF_SELECT[$this->tables_in_charge_of] ?? null;
    }

    public function getCasualsAssignedLabelAttribute($value)
    {
        return static::CASUALS_ASSIGNED_SELECT[$this->casuals_assigned] ?? null;
    }

    public function getClockedInAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setClockedInAttribute($value)
    {
        $this->attributes['clocked_in'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getClockedOutAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setClockedOutAttribute($value)
    {
        $this->attributes['clocked_out'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
