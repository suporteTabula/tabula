<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('categories')->insert([
            ['desc' => 'Finanças e Economia'],
            ['desc' => 'Varejo e Consumo'],
            ['desc' => 'Negócio e Gestão'],
            ['desc' => 'Direito'],
            ['desc' => 'Controladoria e Contabilidade'],
            ['desc' => 'T.I. e Softwares'],
            ['desc' => 'Marketing'],
            ['desc' => 'Engenharia'],
            ['desc' => 'Concursos e Certificação'],
            ['desc' => 'Arquitetura e Design'],
            ['desc' => 'Saúde'],
            ['desc' => 'História e Arte'],
            ['desc' => 'Ensino Médio e Fundamental'],
            ['desc' => 'Vídeo e Fotografia'],
            ['desc' => 'Culinária e Hobbies']
       ]);
    }
}
