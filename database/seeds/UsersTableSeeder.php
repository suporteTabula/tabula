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
            'desc' => 'Fundamental - Incompleto'
        ]);   

        $schooling = App\Schooling::create([
            'desc' => 'Fundamental - Completo'
        ]); 
        $schooling = App\Schooling::create([
            'desc' => 'Médio - Incompleto'
        ]); 
        $schooling = App\Schooling::create([
            'desc' => 'Médio - Completo'
        ]); 
        $schooling = App\Schooling::create([
            'desc' => 'Superior - Incompleto'
        ]); 
        $schooling = App\Schooling::create([
            'desc' => 'Superior - Completo'
        ]);      
        $schooling = App\Schooling::create([
            'desc' => 'Pós Graduação - Incompleto'
        ]); 
        $schooling = App\Schooling::create([
            'desc' => 'Pós Graduação - Completo'
        ]); 


        $user = App\User::create([
            'login' => 'Tabula',
            'name' => 'Tabula',
            'sex' => 'Masculino',
            'occupation' => 'Admin',
            'birthdate' => '01/01/2016',
        	'email' => 'tabula@tabula.com.br',
        	'password' => bcrypt('tabula'),
            'country_id' => '1',
            'state_id' => '1',
            'schooling_id' => $schooling->id
        ]);

        $user->userTypes()->attach(1);
    }
}
