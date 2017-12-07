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
        	'categoryName' => 'Finanças e Economia'
        ]);

        App\Category::create([
        	'categoryName' => 'Varejo e Consumo'
        ]);

        App\Category::create([
        	'categoryName' => 'Negócio e Gestão'
        ]);

        App\Category::create([
        	'categoryName' => 'Direito'
        ]);

        App\Category::create([
        	'categoryName' => 'Controladoria e Contabilidade'
        ]);

        App\Category::create([
        	'categoryName' => 'T.I. e Softwares'
        ]);

        App\Category::create([
        	'categoryName' => 'Marketing'
        ]);

        App\Category::create([
        	'categoryName' => 'Engenharia'
        ]);

        App\Category::create([
        	'categoryName' => 'Concursos e Certificação'
        ]);

        App\Category::create([
        	'categoryName' => 'Arquitetura e Design'
        ]);

        App\Category::create([
        	'categoryName' => 'Saúde'
        ]);

        App\Category::create([
        	'categoryName' => 'História e Arte'
        ]);

        App\Category::create([
        	'categoryName' => 'Ensino Médio e Fundamental'
        ]);

        App\Category::create([
        	'categoryName' => 'Vídeo e Fotografia'
        ]);

        App\Category::create([
        	'categoryName' => 'Culinária e Hobbies'
        ]);
    }
}
