<?php

namespace App\Http\Controllers\Admin;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController
{
    public function index()
    {
        $settings1 = [
            'chart_title'           => 'Total Products',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Product',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'w-full lg:w-6/12 xl:w-3/12',
            'entries_number'        => '5',
            'translation_key'       => 'product',
        ];

        $settings1['total_number'] = 0;
        if (class_exists($settings1['model'])) {
            $settings1['total_number'] = $settings1['model']::when(isset($settings1['filter_field']), function ($query) use ($settings1) {
                if (isset($settings1['filter_days'])) {
                    return $query->where($settings1['filter_field'], '>=',
                now()->subDays($settings1['filter_days'])->format('Y-m-d'));
                }
                if (isset($settings1['filter_period'])) {
                    switch ($settings1['filter_period']) {
                case 'week': $start = date('Y-m-d', strtotime('last Monday')); break;
                case 'month': $start = date('Y-m') . '-01'; break;
                case 'year': $start = date('Y') . '-01-01'; break;
            }
                    if (isset($start)) {
                        return $query->where($settings1['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings1['aggregate_function'] ?? 'count'}($settings1['aggregate_field'] ?? '*');
        }

        $settings2 = [
            'chart_title'           => 'Total Staff',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Staff',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'w-full lg:w-6/12 xl:w-3/12',
            'entries_number'        => '5',
            'translation_key'       => 'staff',
        ];

        $settings2['total_number'] = 0;
        if (class_exists($settings2['model'])) {
            $settings2['total_number'] = $settings2['model']::when(isset($settings2['filter_field']), function ($query) use ($settings2) {
                if (isset($settings2['filter_days'])) {
                    return $query->where($settings2['filter_field'], '>=',
                now()->subDays($settings2['filter_days'])->format('Y-m-d'));
                }
                if (isset($settings2['filter_period'])) {
                    switch ($settings2['filter_period']) {
                case 'week': $start = date('Y-m-d', strtotime('last Monday')); break;
                case 'month': $start = date('Y-m') . '-01'; break;
                case 'year': $start = date('Y') . '-01-01'; break;
            }
                    if (isset($start)) {
                        return $query->where($settings2['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings2['aggregate_function'] ?? 'count'}($settings2['aggregate_field'] ?? '*');
        }

        $settings3 = [
            'chart_title'           => 'Total Sections',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Section',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'w-full lg:w-6/12 xl:w-3/12',
            'entries_number'        => '5',
            'translation_key'       => 'section',
        ];

        $settings3['total_number'] = 0;
        if (class_exists($settings3['model'])) {
            $settings3['total_number'] = $settings3['model']::when(isset($settings3['filter_field']), function ($query) use ($settings3) {
                if (isset($settings3['filter_days'])) {
                    return $query->where($settings3['filter_field'], '>=',
                now()->subDays($settings3['filter_days'])->format('Y-m-d'));
                }
                if (isset($settings3['filter_period'])) {
                    switch ($settings3['filter_period']) {
                case 'week': $start = date('Y-m-d', strtotime('last Monday')); break;
                case 'month': $start = date('Y-m') . '-01'; break;
                case 'year': $start = date('Y') . '-01-01'; break;
            }
                    if (isset($start)) {
                        return $query->where($settings3['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings3['aggregate_function'] ?? 'count'}($settings3['aggregate_field'] ?? '*');
        }

        $settings4 = [
            'chart_title'           => 'Total Tables',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Table',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'w-full lg:w-6/12 xl:w-3/12',
            'entries_number'        => '5',
            'translation_key'       => 'table',
        ];

        $settings4['total_number'] = 0;
        if (class_exists($settings4['model'])) {
            $settings4['total_number'] = $settings4['model']::when(isset($settings4['filter_field']), function ($query) use ($settings4) {
                if (isset($settings4['filter_days'])) {
                    return $query->where($settings4['filter_field'], '>=',
                now()->subDays($settings4['filter_days'])->format('Y-m-d'));
                }
                if (isset($settings4['filter_period'])) {
                    switch ($settings4['filter_period']) {
                case 'week': $start = date('Y-m-d', strtotime('last Monday')); break;
                case 'month': $start = date('Y-m') . '-01'; break;
                case 'year': $start = date('Y') . '-01-01'; break;
            }
                    if (isset($start)) {
                        return $query->where($settings4['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings4['aggregate_function'] ?? 'count'}($settings4['aggregate_field'] ?? '*');
        }

        $settings5 = [
            'chart_title'           => 'Orders This Week',
            'chart_type'            => 'line',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Order',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_days'           => '7',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'w-full',
            'entries_number'        => '5',
            'translation_key'       => 'order',
        ];

        $chart5 = new LaravelChart($settings5);

        $settings6 = [
            'chart_title'           => 'Orders This Month',
            'chart_type'            => 'line',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Order',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_period'         => 'month',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'w-full',
            'entries_number'        => '5',
            'translation_key'       => 'order',
        ];

        $chart6 = new LaravelChart($settings6);

        $settings7 = [
            'chart_title'           => 'Latest Orders',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Order',
            'group_by_field'        => 'completed_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'w-full',
            'entries_number'        => '10',
            'fields'                => [
                'id'           => '',
                'status'       => '',
                'taken_by'     => '',
                'table_number' => '',
                'total_amount' => '',
            ],
            'translation_key' => 'order',
        ];

        $settings7['data'] = [];
        if (class_exists($settings7['model'])) {
            $settings7['data'] = $settings7['model']::latest()
                ->take($settings7['entries_number'])
                ->get();
        }

        if (!array_key_exists('fields', $settings7)) {
            $settings7['fields'] = [];
        }

        $settings8 = [
            'chart_title'        => 'Section Sales Today',
            'chart_type'         => 'pie',
            'report_type'        => 'group_by_relationship',
            'model'              => 'App\Models\SectionSale',
            'group_by_field'     => 'name',
            'aggregate_function' => 'sum',
            'aggregate_field'    => 'todays_sales',
            'filter_field'       => 'created_at',
            'column_class'       => 'w-full lg:w-6/12 xl:w-3/12',
            'entries_number'     => '5',
            'relationship_name'  => 'section',
            'translation_key'    => 'sectionSale',
        ];

        $chart8 = new LaravelChart($settings8);

        $settings9 = [
            'chart_title'        => 'Section Sales This Week',
            'chart_type'         => 'pie',
            'report_type'        => 'group_by_relationship',
            'model'              => 'App\Models\SectionSale',
            'group_by_field'     => 'name',
            'aggregate_function' => 'sum',
            'aggregate_field'    => 'weeks_sales',
            'filter_field'       => 'created_at',
            'column_class'       => 'w-full lg:w-6/12 xl:w-3/12',
            'entries_number'     => '5',
            'relationship_name'  => 'section',
            'translation_key'    => 'sectionSale',
        ];

        $chart9 = new LaravelChart($settings9);

        $settings10 = [
            'chart_title'        => 'Section Sales This Month',
            'chart_type'         => 'pie',
            'report_type'        => 'group_by_relationship',
            'model'              => 'App\Models\SectionSale',
            'group_by_field'     => 'name',
            'aggregate_function' => 'sum',
            'aggregate_field'    => 'months_sales',
            'filter_field'       => 'created_at',
            'column_class'       => 'w-full lg:w-6/12 xl:w-3/12',
            'entries_number'     => '5',
            'relationship_name'  => 'section',
            'translation_key'    => 'sectionSale',
        ];

        $chart10 = new LaravelChart($settings10);

        $settings11 = [
            'chart_title'        => 'Section Sales This Year',
            'chart_type'         => 'pie',
            'report_type'        => 'group_by_relationship',
            'model'              => 'App\Models\SectionSale',
            'group_by_field'     => 'name',
            'aggregate_function' => 'sum',
            'aggregate_field'    => 'years_sales',
            'filter_field'       => 'created_at',
            'column_class'       => 'w-full lg:w-6/12 xl:w-3/12',
            'entries_number'     => '5',
            'relationship_name'  => 'section',
            'translation_key'    => 'sectionSale',
        ];

        $chart11 = new LaravelChart($settings11);

        $settings12 = [
            'chart_title'           => 'Booking Statistics',
            'chart_type'            => 'line',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Booking',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'w-full xl:w-6/12',
            'entries_number'        => '5',
            'translation_key'       => 'booking',
        ];

        $chart12 = new LaravelChart($settings12);

        $settings13 = [
            'chart_title'           => 'Latest Bookings',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Booking',
            'group_by_field'        => 'booked_for',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'w-full xl:w-6/12',
            'entries_number'        => '10',
            'fields'                => [
                'id'           => '',
                'booked_by'    => '',
                'booked_for'   => '',
                'table_booked' => 'table_number',
                'specifics'    => '',
            ],
            'translation_key' => 'booking',
        ];

        $settings13['data'] = [];
        if (class_exists($settings13['model'])) {
            $settings13['data'] = $settings13['model']::latest()
                ->take($settings13['entries_number'])
                ->get();
        }

        if (!array_key_exists('fields', $settings13)) {
            $settings13['fields'] = [];
        }

        return view('admin.home', compact('settings1', 'settings2', 'settings3', 'settings4', 'chart5', 'chart6', 'settings7', 'chart8', 'chart9', 'chart10', 'chart11', 'chart12', 'settings13'));
    }
}
