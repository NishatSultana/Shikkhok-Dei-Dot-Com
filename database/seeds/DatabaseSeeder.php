<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([
            ModulesTableSeeder::class,
            PermissionsTableSeeder::class,
            GroupsTableSeeder::class,
            UsersTableSeeder::class,
        ]);
    }
}
