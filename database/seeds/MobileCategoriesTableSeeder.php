<?php

use Illuminate\Database\Seeder;

class MobileCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mobile_categories')->insert([
            ['desc' => 'Finanças e Economia'],
            ['desc' => 'Controladoria e Contabilidade'],
            ['desc' => 'T.I. e Softwares'],
            ['desc' => 'Saúde'],
            ['desc' => 'História e Arte'],
            ['desc' => 'Varejo e Consumo'],
            ['desc' => 'Direito'],
            ['desc' => 'Marketing'],
            ['desc' => 'Arquitetura e Design'],
            ['desc' => 'Ensino Médio e Fundamental'],
            ['desc' => 'Hobbies'],
            ['desc' => 'Negócio e Gestão'],
            ['desc' => 'Engenharia'],
            ['desc' => 'Concursos e Certificação'],
            ['desc' => 'Vídeo e Fotografia'],
            ['desc' => 'Gastronomia']
        ]);
    }
}
