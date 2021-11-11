<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'system_calendar_access',
            ],
            [
                'id'    => 19,
                'title' => 'contact_management_access',
            ],
            [
                'id'    => 20,
                'title' => 'contact_company_create',
            ],
            [
                'id'    => 21,
                'title' => 'contact_company_edit',
            ],
            [
                'id'    => 22,
                'title' => 'contact_company_show',
            ],
            [
                'id'    => 23,
                'title' => 'contact_company_delete',
            ],
            [
                'id'    => 24,
                'title' => 'contact_company_access',
            ],
            [
                'id'    => 25,
                'title' => 'contact_contact_create',
            ],
            [
                'id'    => 26,
                'title' => 'contact_contact_edit',
            ],
            [
                'id'    => 27,
                'title' => 'contact_contact_show',
            ],
            [
                'id'    => 28,
                'title' => 'contact_contact_delete',
            ],
            [
                'id'    => 29,
                'title' => 'contact_contact_access',
            ],
            [
                'id'    => 30,
                'title' => 'staff_create',
            ],
            [
                'id'    => 31,
                'title' => 'staff_edit',
            ],
            [
                'id'    => 32,
                'title' => 'staff_show',
            ],
            [
                'id'    => 33,
                'title' => 'staff_delete',
            ],
            [
                'id'    => 34,
                'title' => 'staff_access',
            ],
            [
                'id'    => 35,
                'title' => 'inventory_management_access',
            ],
            [
                'id'    => 36,
                'title' => 'product_create',
            ],
            [
                'id'    => 37,
                'title' => 'product_edit',
            ],
            [
                'id'    => 38,
                'title' => 'product_show',
            ],
            [
                'id'    => 39,
                'title' => 'product_delete',
            ],
            [
                'id'    => 40,
                'title' => 'product_access',
            ],
            [
                'id'    => 41,
                'title' => 'point_of_sale_access',
            ],
            [
                'id'    => 42,
                'title' => 'cart_create',
            ],
            [
                'id'    => 43,
                'title' => 'cart_edit',
            ],
            [
                'id'    => 44,
                'title' => 'cart_show',
            ],
            [
                'id'    => 45,
                'title' => 'cart_delete',
            ],
            [
                'id'    => 46,
                'title' => 'cart_access',
            ],
            [
                'id'    => 47,
                'title' => 'transaction_create',
            ],
            [
                'id'    => 48,
                'title' => 'transaction_edit',
            ],
            [
                'id'    => 49,
                'title' => 'transaction_show',
            ],
            [
                'id'    => 50,
                'title' => 'transaction_delete',
            ],
            [
                'id'    => 51,
                'title' => 'transaction_access',
            ],
            [
                'id'    => 52,
                'title' => 'order_detail_create',
            ],
            [
                'id'    => 53,
                'title' => 'order_detail_edit',
            ],
            [
                'id'    => 54,
                'title' => 'order_detail_show',
            ],
            [
                'id'    => 55,
                'title' => 'order_detail_delete',
            ],
            [
                'id'    => 56,
                'title' => 'order_detail_access',
            ],
            [
                'id'    => 57,
                'title' => 'order_create',
            ],
            [
                'id'    => 58,
                'title' => 'order_edit',
            ],
            [
                'id'    => 59,
                'title' => 'order_show',
            ],
            [
                'id'    => 60,
                'title' => 'order_delete',
            ],
            [
                'id'    => 61,
                'title' => 'order_access',
            ],
            [
                'id'    => 62,
                'title' => 'premises_management_access',
            ],
            [
                'id'    => 63,
                'title' => 'section_create',
            ],
            [
                'id'    => 64,
                'title' => 'section_edit',
            ],
            [
                'id'    => 65,
                'title' => 'section_show',
            ],
            [
                'id'    => 66,
                'title' => 'section_delete',
            ],
            [
                'id'    => 67,
                'title' => 'section_access',
            ],
            [
                'id'    => 68,
                'title' => 'table_create',
            ],
            [
                'id'    => 69,
                'title' => 'table_edit',
            ],
            [
                'id'    => 70,
                'title' => 'table_show',
            ],
            [
                'id'    => 71,
                'title' => 'table_delete',
            ],
            [
                'id'    => 72,
                'title' => 'table_access',
            ],
            [
                'id'    => 73,
                'title' => 'notification_create',
            ],
            [
                'id'    => 74,
                'title' => 'notification_edit',
            ],
            [
                'id'    => 75,
                'title' => 'notification_show',
            ],
            [
                'id'    => 76,
                'title' => 'notification_delete',
            ],
            [
                'id'    => 77,
                'title' => 'notification_access',
            ],
            [
                'id'    => 78,
                'title' => 'requisition_create',
            ],
            [
                'id'    => 79,
                'title' => 'requisition_edit',
            ],
            [
                'id'    => 80,
                'title' => 'requisition_show',
            ],
            [
                'id'    => 81,
                'title' => 'requisition_delete',
            ],
            [
                'id'    => 82,
                'title' => 'requisition_access',
            ],
            [
                'id'    => 83,
                'title' => 'sms_order_access',
            ],
            [
                'id'    => 84,
                'title' => 'sms_create',
            ],
            [
                'id'    => 85,
                'title' => 'sms_edit',
            ],
            [
                'id'    => 86,
                'title' => 'sms_show',
            ],
            [
                'id'    => 87,
                'title' => 'sms_delete',
            ],
            [
                'id'    => 88,
                'title' => 'sms_access',
            ],
            [
                'id'    => 89,
                'title' => 'discount_create',
            ],
            [
                'id'    => 90,
                'title' => 'discount_edit',
            ],
            [
                'id'    => 91,
                'title' => 'discount_show',
            ],
            [
                'id'    => 92,
                'title' => 'discount_delete',
            ],
            [
                'id'    => 93,
                'title' => 'discount_access',
            ],
            [
                'id'    => 94,
                'title' => 'customer_create',
            ],
            [
                'id'    => 95,
                'title' => 'customer_edit',
            ],
            [
                'id'    => 96,
                'title' => 'customer_show',
            ],
            [
                'id'    => 97,
                'title' => 'customer_delete',
            ],
            [
                'id'    => 98,
                'title' => 'customer_access',
            ],
            [
                'id'    => 99,
                'title' => 'booking_create',
            ],
            [
                'id'    => 100,
                'title' => 'booking_edit',
            ],
            [
                'id'    => 101,
                'title' => 'booking_show',
            ],
            [
                'id'    => 102,
                'title' => 'booking_delete',
            ],
            [
                'id'    => 103,
                'title' => 'booking_access',
            ],
            [
                'id'    => 104,
                'title' => 'section_sale_create',
            ],
            [
                'id'    => 105,
                'title' => 'section_sale_edit',
            ],
            [
                'id'    => 106,
                'title' => 'section_sale_show',
            ],
            [
                'id'    => 107,
                'title' => 'section_sale_delete',
            ],
            [
                'id'    => 108,
                'title' => 'section_sale_access',
            ],
            [
                'id'    => 109,
                'title' => 'category_create',
            ],
            [
                'id'    => 110,
                'title' => 'category_edit',
            ],
            [
                'id'    => 111,
                'title' => 'category_show',
            ],
            [
                'id'    => 112,
                'title' => 'category_delete',
            ],
            [
                'id'    => 113,
                'title' => 'category_access',
            ],
            [
                'id'    => 114,
                'title' => 'type_create',
            ],
            [
                'id'    => 115,
                'title' => 'type_edit',
            ],
            [
                'id'    => 116,
                'title' => 'type_show',
            ],
            [
                'id'    => 117,
                'title' => 'type_delete',
            ],
            [
                'id'    => 118,
                'title' => 'type_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
