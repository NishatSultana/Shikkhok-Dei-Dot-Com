<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
        	[
        		'full_name' => 'System Admin',
        		'email' => 'system@shikkhonkhuji.com',
        		'mobile' => '01516112348',
        		'password' => Hash::make('123456'),
        		'is_system_user' => 1,
                'is_staff' => 0,
        		'group_id' => 1,
        	],
        	[
        		'full_name' => 'Admin',
        		'email' => 'admin@shikkhonkhuji.com',
        		'mobile' => '',
        		'password' => Hash::make('123456'),
        		'is_system_user' => 0,
        		'is_staff' => 1,
        		'group_id' => 2,
        	],
        	[
        		'full_name' => 'Student/Guardian',
        		'email' => 'student_guardian@shikkhonkhuji.com',
        		'mobile' => '',
        		'password' => Hash::make('123456'),
        		'is_system_user' => 0,
                'is_staff' => 1,
        		'group_id' => 3,
        	],
            [
        		'full_name' => 'Tutor',
        		'email' => 'tutor@shikkhonkhuji.com',
        		'mobile' => '',
        		'password' => Hash::make('123456'),
        		'is_system_user' => 0,
                'is_staff' => 0,
        		'group_id' => 4,
        	],
        ];

        foreach ($users as $user) {
            App\User::create($user);
        }
    }
}
