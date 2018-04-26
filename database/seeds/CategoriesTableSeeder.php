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
            [
                'desc' => 'Finanças e Economia',
                'desktop_index' => '1',
                'mobile_index' => '1',
                'desktop_hex_bg' => 'category-1.svg',
                'mobile_hex_bg' => 'category-1.svg',
                'hex_icon' => 'category-1.svg',
                'hex_course_icon' => 'category-1.svg'
            ], [
                'desc' => 'Varejo e Consumo',
                'desktop_index' => '2',
                'mobile_index' => '6',
                'desktop_hex_bg' => 'category-2.svg',
                'mobile_hex_bg' => 'category-2.svg',
                'hex_icon' => 'category-2.svg',
                'hex_course_icon' => 'category-2.svg'
            ], [
                'desc' => 'Negócio e Gestão',
                'desktop_index' => '3',
                'mobile_index' => '12',
                'desktop_hex_bg' => 'category-3.svg',
                'mobile_hex_bg' => 'category-3.svg',
                'hex_icon' => 'category-3.svg',
                'hex_course_icon' => 'category-3.svg'
            ], [
                'desc' => 'Direito',
                'desktop_index' => '4',
                'mobile_index' => '7',
                'desktop_hex_bg' => 'category-4.svg',
                'mobile_hex_bg' => 'category-4.svg',
                'hex_icon' => 'category-4.svg',
                'hex_course_icon' => 'category-4.svg'
            ], [
                'desc' => 'Controladoria e Contabilidade',
                'desktop_index' => '5',
                'mobile_index' => '2',
                'desktop_hex_bg' => 'category-5.svg',
                'mobile_hex_bg' => 'category-5.svg',
                'hex_icon' => 'category-5.svg',
                'hex_course_icon' => 'category-5.svg'
            ], [
                'desc' => 'T.I. e Softwares',
                'desktop_index' => '6',
                'mobile_index' => '3',
                'desktop_hex_bg' => 'category-6.svg',
                'mobile_hex_bg' => 'category-6.svg',
                'hex_icon' => 'category-6.svg',
                'hex_course_icon' => 'category-6.svg'
            ], [
                'desc' => 'Marketing',
                'desktop_index' => '7',
                'mobile_index' => '8',
                'desktop_hex_bg' => 'category-7.svg',
                'mobile_hex_bg' => 'category-7.svg',
                'hex_icon' => 'category-7.svg',
                'hex_course_icon' => 'category-7.svg'
            ], [
                'desc' => 'Engenharia',
                'desktop_index' => '8',
                'mobile_index' => '13',
                'desktop_hex_bg' => 'category-8.svg',
                'mobile_hex_bg' => 'category-8.svg',
                'hex_icon' => 'category-8.svg',
                'hex_course_icon' => 'category-8.svg'
            ], [
                'desc' => 'Concursos e Certificação',
                'desktop_index' => '9',
                'mobile_index' => '14',
                'desktop_hex_bg' => 'category-9.svg',
                'mobile_hex_bg' => 'category-9.svg',
                'hex_icon' => 'category-9.svg',
                'hex_course_icon' => 'category-9.svg'
            ], [
                'desc' => 'Arquitetura e Design',
                'desktop_index' => '10',
                'mobile_index' => '9',
                'desktop_hex_bg' => 'category-10.svg',
                'mobile_hex_bg' => 'category-10.svg',
                'hex_icon' => 'category-10.svg',
                'hex_course_icon' => 'category-10.svg'
            ], [
                'desc' => 'Saúde',
                'desktop_index' => '11',
                'mobile_index' => '4',
                'desktop_hex_bg' => 'category-11.svg',
                'mobile_hex_bg' => 'category-11.svg',
                'hex_icon' => 'category-11.svg',
                'hex_course_icon' => 'category-11.svg'
            ], [
                'desc' => 'História e Arte',
                'desktop_index' => '12',
                'mobile_index' => '5',
                'desktop_hex_bg' => 'category-12.svg',
                'mobile_hex_bg' => 'category-12.svg',
                'hex_icon' => 'category-12.svg',
                'hex_course_icon' => 'category-12.svg'
            ], [
                'desc' => 'Ensino Médio e Fundamental',
                'desktop_index' => '13',
                'mobile_index' => '10',
                'desktop_hex_bg' => 'category-13.svg',
                'mobile_hex_bg' => 'category-13.svg',
                'hex_icon' => 'category-13.svg',
                'hex_course_icon' => 'category-13.svg'
            ], [
                'desc' => 'Vídeo e Fotografia',
                'desktop_index' => '14',
                'mobile_index' => '15',
                'desktop_hex_bg' => 'category-14.svg',
                'mobile_hex_bg' => 'category-14.svg',
                'hex_icon' => 'category-14.svg',
                'hex_course_icon' => 'category-14.svg'
            ], [
                'desc' => 'Gastronomia',
                'desktop_index' => '15',
                'mobile_index' => '16',
                'desktop_hex_bg' => 'category-15.svg',
                'mobile_hex_bg' => 'category-15.svg',
                'hex_icon' => 'category-15.svg',
                'hex_course_icon' => 'category-15.svg'
            ], [
                'desc' => 'Hobbies',
                'desktop_index' => '16',
                'mobile_index' => '11',
                'desktop_hex_bg' => 'category-16.svg',
                'mobile_hex_bg' => 'category-16.svg',
                'hex_icon' => 'category-16.svg',
                'hex_course_icon' => 'category-16.svg'
            ]
        ]);
    }
}