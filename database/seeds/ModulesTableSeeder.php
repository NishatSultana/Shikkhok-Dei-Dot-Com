<?php

use Illuminate\Database\Seeder;

class ModulesTableSeeder extends Seeder
{

    public function run()
    {
        $modules = [
        	[
        		'label' => 'Modules',
        		'url' => 'modules'
        	],
            [
                'label' => 'Permissions',
                'url' => 'permissions'
            ],
        ];

        foreach ($modules as $module) {
            App\Module::create($module);
        }
    }
}
