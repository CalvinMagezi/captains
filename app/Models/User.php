<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Hash;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Translation\HasLocalePreference;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements HasLocalePreference
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Notifiable;

    public $table = 'users';

    public static $search = [
        'role',
        'position',
    ];

    public $orderable = [
        'id',
        'unique_key',
        'name',
        'email',
        'phone_number',
        'email_verified_at',
        'locale',
        'role',
        'position',
    ];

    public $filterable = [
        'id',
        'unique_key',
        'name',
        'email',
        'phone_number',
        'email_verified_at',
        'roles.title',
        'locale',
        'role',
        'position',
    ];

    protected $hidden = [
        'remember_token',
        'password',
        'pin',
    ];

    protected $dates = [
        'email_verified_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'unique_key',
        'name',
        'email',
        'phone_number',
        'password',
        'tables_incharge_of',
        'locale',
        'staff_number',
        'color_code',
        'role',
        'position',
        'pin',
    ];

    public function getIsAdminAttribute()
    {
        return $this->roles()->where('title', 'Admin')->exists();
    }

    public function scopeAdmins()
    {
        return $this->whereHas('roles', fn ($q) => $q->where('title', 'Admin'));
    }

    public function preferredLocale()
    {
        return $this->locale;
    }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = Hash::needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function setPinAttribute($input)
    {
        if ($input) {
            $this->attributes['pin'] = Hash::needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
