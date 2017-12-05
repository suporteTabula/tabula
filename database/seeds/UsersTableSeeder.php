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
        $country = App\Country::create([
            'name' => 'Brazil'
        ]);

        $state = App\State::create([
            'name' => 'São Paulo',
            'country_id' => $country->id
        ]);

        $schooling = App\Schooling::create([
            'desc' => 'Tabula'
        ]);

        $admin = App\UserType::create([
            'desc' => 'Admin'
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
            'country_id' => $country->id,
            'state_id' => $state->id,
            'schooling_id' => $schooling->id
        ]);

        $user->userTypes()->attach($admin->id);
    }
}
