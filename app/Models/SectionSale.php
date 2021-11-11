<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SectionSale extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'section_sales';

    public $orderable = [
        'id',
        'section.name',
        'todays_sales',
        'yesterdays_sales',
        'weeks_sales',
        'months_sales',
        'years_sales',
    ];

    public $filterable = [
        'id',
        'section.name',
        'todays_sales',
        'yesterdays_sales',
        'weeks_sales',
        'months_sales',
        'years_sales',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'section_id',
        'todays_sales',
        'yesterdays_sales',
        'weeks_sales',
        'months_sales',
        'years_sales',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
