<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Table extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'tables';

    public $orderable = [
        'id',
        'table_number',
        'qr_code',
        'managed_by',
        'table_key',
        'color_code',
        'order',
        'section',
        'position',
        'status',
        'top',
        'left',
    ];

    public $filterable = [
        'id',
        'table_number',
        'qr_code',
        'managed_by',
        'table_key',
        'color_code',
        'order',
        'section',
        'position',
        'status',
        'top',
        'left',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'table_number',
        'qr_code',
        'managed_by',
        'table_key',
        'color_code',
        'order',
        'section',
        'position',
        'status',
        'top',
        'left',
    ];

    public static function tableList(){
        $tables = Table::all();
        return $tables;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
