<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [
        	[
        		'name' => 'System Admin',
        		'display' => 0
        	],
        	[
        		'name' => 'Admin',
        		'display' => 1
        	],
        	[
        		'name' => 'Student/Guardian',
        		'display' => 1
        	],
            [
                'name' => 'Tutor',
                'display' => 1
            ]
        ];
        foreach ($groups as $group) {
            App\Group::create($group);
        }

    }
}
