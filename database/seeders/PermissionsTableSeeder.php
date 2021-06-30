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
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'work_create',
            ],
            [
                'id'    => 18,
                'title' => 'work_edit',
            ],
            [
                'id'    => 19,
                'title' => 'work_show',
            ],
            [
                'id'    => 20,
                'title' => 'work_delete',
            ],
            [
                'id'    => 21,
                'title' => 'work_access',
            ],
            [
                'id'    => 22,
                'title' => 'offer_create',
            ],
            [
                'id'    => 23,
                'title' => 'offer_edit',
            ],
            [
                'id'    => 24,
                'title' => 'offer_show',
            ],
            [
                'id'    => 25,
                'title' => 'offer_delete',
            ],
            [
                'id'    => 26,
                'title' => 'offer_access',
            ],
            [
                'id'    => 27,
                'title' => 'message_create',
            ],
            [
                'id'    => 28,
                'title' => 'message_edit',
            ],
            [
                'id'    => 29,
                'title' => 'message_show',
            ],
            [
                'id'    => 30,
                'title' => 'message_delete',
            ],
            [
                'id'    => 31,
                'title' => 'message_access',
            ],
            [
                'id'    => 32,
                'title' => 'category_create',
            ],
            [
                'id'    => 33,
                'title' => 'category_edit',
            ],
            [
                'id'    => 34,
                'title' => 'category_show',
            ],
            [
                'id'    => 35,
                'title' => 'category_delete',
            ],
            [
                'id'    => 36,
                'title' => 'category_access',
            ],
            [
                'id'    => 37,
                'title' => 'working_hour_create',
            ],
            [
                'id'    => 38,
                'title' => 'working_hour_edit',
            ],
            [
                'id'    => 39,
                'title' => 'working_hour_show',
            ],
            [
                'id'    => 40,
                'title' => 'working_hour_delete',
            ],
            [
                'id'    => 41,
                'title' => 'working_hour_access',
            ],
            [
                'id'    => 42,
                'title' => 'work_management_access',
            ],
            [
                'id'    => 43,
                'title' => 'user_image_create',
            ],
            [
                'id'    => 44,
                'title' => 'user_image_edit',
            ],
            [
                'id'    => 45,
                'title' => 'user_image_show',
            ],
            [
                'id'    => 46,
                'title' => 'user_image_delete',
            ],
            [
                'id'    => 47,
                'title' => 'user_image_access',
            ],
            [
                'id'    => 48,
                'title' => 'work_image_create',
            ],
            [
                'id'    => 49,
                'title' => 'work_image_edit',
            ],
            [
                'id'    => 50,
                'title' => 'work_image_show',
            ],
            [
                'id'    => 51,
                'title' => 'work_image_delete',
            ],
            [
                'id'    => 52,
                'title' => 'work_image_access',
            ],
            [
                'id'    => 53,
                'title' => 'feedback_create',
            ],
            [
                'id'    => 54,
                'title' => 'feedback_edit',
            ],
            [
                'id'    => 55,
                'title' => 'feedback_show',
            ],
            [
                'id'    => 56,
                'title' => 'feedback_delete',
            ],
            [
                'id'    => 57,
                'title' => 'feedback_access',
            ],
            [
                'id'    => 58,
                'title' => 'account_operation_create',
            ],
            [
                'id'    => 59,
                'title' => 'account_operation_edit',
            ],
            [
                'id'    => 60,
                'title' => 'account_operation_show',
            ],
            [
                'id'    => 61,
                'title' => 'account_operation_delete',
            ],
            [
                'id'    => 62,
                'title' => 'account_operation_access',
            ],
            [
                'id'    => 63,
                'title' => 'favourite_user_create',
            ],
            [
                'id'    => 64,
                'title' => 'favourite_user_edit',
            ],
            [
                'id'    => 65,
                'title' => 'favourite_user_show',
            ],
            [
                'id'    => 66,
                'title' => 'favourite_user_delete',
            ],
            [
                'id'    => 67,
                'title' => 'favourite_user_access',
            ],
            [
                'id'    => 68,
                'title' => 'favourite_work_create',
            ],
            [
                'id'    => 69,
                'title' => 'favourite_work_edit',
            ],
            [
                'id'    => 70,
                'title' => 'favourite_work_show',
            ],
            [
                'id'    => 71,
                'title' => 'favourite_work_delete',
            ],
            [
                'id'    => 72,
                'title' => 'favourite_work_access',
            ],
            [
                'id'    => 73,
                'title' => 'help_access',
            ],
            [
                'id'    => 74,
                'title' => 'answer_create',
            ],
            [
                'id'    => 75,
                'title' => 'answer_edit',
            ],
            [
                'id'    => 76,
                'title' => 'answer_show',
            ],
            [
                'id'    => 77,
                'title' => 'answer_delete',
            ],
            [
                'id'    => 78,
                'title' => 'answer_access',
            ],
            [
                'id'    => 79,
                'title' => 'tutorial_create',
            ],
            [
                'id'    => 80,
                'title' => 'tutorial_edit',
            ],
            [
                'id'    => 81,
                'title' => 'tutorial_show',
            ],
            [
                'id'    => 82,
                'title' => 'tutorial_delete',
            ],
            [
                'id'    => 83,
                'title' => 'tutorial_access',
            ],
            [
                'id'    => 84,
                'title' => 'verification_create',
            ],
            [
                'id'    => 85,
                'title' => 'verification_edit',
            ],
            [
                'id'    => 86,
                'title' => 'verification_show',
            ],
            [
                'id'    => 87,
                'title' => 'verification_delete',
            ],
            [
                'id'    => 88,
                'title' => 'verification_access',
            ],
            [
                'id'    => 89,
                'title' => 'page_create',
            ],
            [
                'id'    => 90,
                'title' => 'page_edit',
            ],
            [
                'id'    => 91,
                'title' => 'page_show',
            ],
            [
                'id'    => 92,
                'title' => 'page_delete',
            ],
            [
                'id'    => 93,
                'title' => 'page_access',
            ],
            [
                'id'    => 94,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
