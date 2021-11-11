<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'types';

    public $orderable = [
        'id',
        'name',
        'unique_key',
        'dispatched_to.name',
        'description',
    ];

    public $filterable = [
        'id',
        'name',
        'unique_key',
        'dispatched_to.name',
        'description',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'unique_key',
        'dispatched_to_id',
        'description',
    ];

    public function dispatchedTo()
    {
        return $this->belongsTo(Section::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
