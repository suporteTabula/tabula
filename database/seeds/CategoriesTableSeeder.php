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
        App\Category::create([
        	'desc' => 'Finanças e Economia'
        ]);

        App\Category::create([
        	'desc' => 'Varejo e Consumo'
        ]);

        App\Category::create([
        	'desc' => 'Negócio e Gestão'
        ]);

        App\Category::create([
        	'desc' => 'Direito'
        ]);

        App\Category::create([
        	'desc' => 'Controladoria e Contabilidade'
        ]);

        App\Category::create([
        	'desc' => 'T.I. e Softwares'
        ]);

        App\Category::create([
        	'desc' => 'Marketing'
        ]);

        App\Category::create([
        	'desc' => 'Engenharia'
        ]);

        App\Category::create([
        	'desc' => 'Concursos e Certificação'
        ]);

        App\Category::create([
        	'desc' => 'Arquitetura e Design'
        ]);

        App\Category::create([
        	'desc' => 'Saúde'
        ]);

        App\Category::create([
        	'desc' => 'História e Arte'
        ]);

        App\Category::create([
        	'desc' => 'Ensino Médio e Fundamental'
        ]);

        App\Category::create([
        	'desc' => 'Vídeo e Fotografia'
        ]);

        App\Category::create([
        	'desc' => 'Culinária e Hobbies'
        ]);
    }
}
