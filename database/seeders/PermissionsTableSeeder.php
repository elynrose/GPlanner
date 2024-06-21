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
                'title' => 'task_create',
            ],
            [
                'id'    => 18,
                'title' => 'task_edit',
            ],
            [
                'id'    => 19,
                'title' => 'task_show',
            ],
            [
                'id'    => 20,
                'title' => 'task_delete',
            ],
            [
                'id'    => 21,
                'title' => 'task_access',
            ],
            [
                'id'    => 22,
                'title' => 'action_create',
            ],
            [
                'id'    => 23,
                'title' => 'action_edit',
            ],
            [
                'id'    => 24,
                'title' => 'action_show',
            ],
            [
                'id'    => 25,
                'title' => 'action_delete',
            ],
            [
                'id'    => 26,
                'title' => 'action_access',
            ],
            [
                'id'    => 27,
                'title' => 'search_create',
            ],
            [
                'id'    => 28,
                'title' => 'search_edit',
            ],
            [
                'id'    => 29,
                'title' => 'search_show',
            ],
            [
                'id'    => 30,
                'title' => 'search_delete',
            ],
            [
                'id'    => 31,
                'title' => 'search_access',
            ],
            [
                'id'    => 32,
                'title' => 'library_access',
            ],
            [
                'id'    => 33,
                'title' => 'to_do_create',
            ],
            [
                'id'    => 34,
                'title' => 'to_do_edit',
            ],
            [
                'id'    => 35,
                'title' => 'to_do_show',
            ],
            [
                'id'    => 36,
                'title' => 'to_do_delete',
            ],
            [
                'id'    => 37,
                'title' => 'to_do_access',
            ],
            [
                'id'    => 38,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 39,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 40,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 41,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 42,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 43,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 44,
                'title' => 'reminder_create',
            ],
            [
                'id'    => 45,
                'title' => 'reminder_edit',
            ],
            [
                'id'    => 46,
                'title' => 'reminder_show',
            ],
            [
                'id'    => 47,
                'title' => 'reminder_delete',
            ],
            [
                'id'    => 48,
                'title' => 'reminder_access',
            ],
            [
                'id'    => 49,
                'title' => 'mod_create',
            ],
            [
                'id'    => 50,
                'title' => 'mod_edit',
            ],
            [
                'id'    => 51,
                'title' => 'mod_show',
            ],
            [
                'id'    => 52,
                'title' => 'mod_delete',
            ],
            [
                'id'    => 53,
                'title' => 'mod_access',
            ],
            [
                'id'    => 54,
                'title' => 'draft_create',
            ],
            [
                'id'    => 55,
                'title' => 'draft_edit',
            ],
            [
                'id'    => 56,
                'title' => 'draft_show',
            ],
            [
                'id'    => 57,
                'title' => 'draft_delete',
            ],
            [
                'id'    => 58,
                'title' => 'draft_access',
            ],
            [
                'id'    => 59,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
