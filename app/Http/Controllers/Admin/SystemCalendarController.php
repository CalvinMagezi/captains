<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Order;
use App\Models\Requisition;
use App\Models\Sms;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SystemCalendarController extends Controller
{
    public $sources = [
        [
            'model'      => Requisition::class,
            'date_field' => 'created_at',
            'field'      => 'name',
            'prefix'     => 'Requisition',
            'suffix'     => 'created',
            'route'      => 'admin.requisitions.edit',
        ],
        [
            'model'      => Order::class,
            'date_field' => 'created_at',
            'field'      => 'table_number',
            'prefix'     => 'Order on table',
            'suffix'     => 'placed',
            'route'      => 'admin.orders.edit',
        ],
        [
            'model'      => Order::class,
            'date_field' => 'completed_at',
            'field'      => 'id',
            'prefix'     => 'Order',
            'suffix'     => 'closed',
            'route'      => 'admin.orders.edit',
        ],
        [
            'model'      => Booking::class,
            'date_field' => 'created_at',
            'field'      => 'booked_by',
            'prefix'     => 'Booking by',
            'suffix'     => 'created',
            'route'      => 'admin.bookings.edit',
        ],
        [
            'model'      => Booking::class,
            'date_field' => 'booked_for',
            'field'      => 'booked_by',
            'prefix'     => 'Client',
            'suffix'     => 'expected for booking',
            'route'      => 'admin.bookings.edit',
        ],
        [
            'model'      => Sms::class,
            'date_field' => 'created_at',
            'field'      => 'placed_by',
            'prefix'     => 'SMS Order By',
            'suffix'     => 'placed',
            'route'      => 'admin.sms.edit',
        ],
        [
            'model'      => Sms::class,
            'date_field' => 'time',
            'field'      => 'placed_by',
            'prefix'     => 'SMS Order By',
            'suffix'     => 'expected',
            'route'      => 'admin.sms.edit',
        ],
        [
            'model'      => Requisition::class,
            'date_field' => 'latest_date',
            'field'      => 'name',
            'prefix'     => 'Requisition',
            'suffix'     => 'latest date for approval',
            'route'      => 'admin.requisitions.edit',
        ],
        [
            'model'      => Requisition::class,
            'date_field' => 'completed_on',
            'field'      => 'name',
            'prefix'     => 'Requisition',
            'suffix'     => 'completed',
            'route'      => 'admin.requisitions.edit',
        ],
        [
            'model'      => Requisition::class,
            'date_field' => 'approved_on',
            'field'      => 'name',
            'prefix'     => 'Requisition',
            'suffix'     => 'approved',
            'route'      => 'admin.requisitions.edit',
        ],
    ];

    public function index()
    {
        abort_if(Gate::denies('system_calendar_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $events = [];

        foreach ($this->sources as $source) {
            foreach ($source['model']::all() as $model) {
                $crudFieldValue = $model->getAttributes()[$source['date_field']];

                if (!$crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => sprintf(
                        '%s %s %s',
                        trim($source['prefix']),
                        $model->{$source['field']},
                        trim($source['suffix']),
                    ),
                    'start' => $crudFieldValue,
                    'url'   => route($source['route'], $model),
                ];
            }
        }

        return view('admin.system-calendar.index', compact('events'));
    }
}
