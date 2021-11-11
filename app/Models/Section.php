<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'sections';

    public $orderable = [
        'id',
        'name',
        'slug',
        'items',
        'assigned_to.name',
        'total_sales',
        'today_sales',
    ];

    public $filterable = [
        'id',
        'name',
        'slug',
        'items',
        'assigned_to.name',
        'total_sales',
        'today_sales',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'slug',
        'items',
        'assigned_to_id',
        'total_sales',
        'today_sales',
    ];

    public function assignedTo()
    {
        return $this->belongsTo(User::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
