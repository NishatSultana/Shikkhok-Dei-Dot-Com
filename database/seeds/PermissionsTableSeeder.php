<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    public function run()
    {
        $permissions = [
            [
                'name' => 'View Module',
                'codename' => 'view_modules',
                'module_id' => 1
            ],
            [
                'name' => 'Add Module',
                'codename' => 'add_modules',
                'module_id' => 1
            ],
            [
                'name' => 'Change Module',
                'codename' => 'change_modules',
                'module_id' => 1
            ],
            [
                'name' => 'Delete Module',
                'codename' => 'delete_modules',
                'module_id' => 1
            ],
            [
                'name' => 'View Permissions',
                'codename' => 'view_Permissions',
                'module_id' => 2
            ],
            [
                'name' => 'Add Permissions',
                'codename' => 'add_Permissions',
                'module_id' => 2
            ],
            [
                'name' => 'Change Permissions',
                'codename' => 'change_Permissions',
                'module_id' => 2
            ],
            [
                'name' => 'Delete Permissions',
                'codename' => 'delete_Permissions',
                'module_id' => 2
            ],

        ];

        foreach ($permissions as $permission) {
            App\Permission::create($permission);
        }
    }
}
