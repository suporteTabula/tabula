<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userType = App\UserType::create([
            'type_name' => 'Admin'
        ]);


        App\User::create([
        	'name' => 'Admin',
        	'email' => 'tabula@tabula.com.br',
        	'password' => bcrypt('tabula'),
            'userType_id' => $userType->id,
        	'admin' => 1
        ]);
    }
}
