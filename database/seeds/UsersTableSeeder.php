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
        $schooling = App\Schooling::create([
            'desc' => 'Tabula'
        ]);        

        $user = App\User::create([
            'login' => 'Tabula',
            'first_name' => 'Tabula',
            'last_name' => 'Admin',
            'sex' => 'Masculino',
            'occupation' => 'Admin',
            'birthdate' => '01/01/2016',
        	'nickname' => 'Admin',
        	'email' => 'tabula@tabula.com.br',
        	'password' => bcrypt('tabula'),
            'country_id' => '1',
            'state_id' => '1',
            'schooling_id' => $schooling->id
        ]);

        $user->userTypes()->attach(1);
    }
}
