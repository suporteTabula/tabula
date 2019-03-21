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
                'urn' => 'financas-e-economia',
                'desktop_index' => '1',
                'mobile_index' => '1',
                'desktop_hex_bg' => 'category-1.svg',
                'mobile_hex_bg' => 'category-1.svg',
                'hex_icon' => 'category-1.gif',
                'hex_course_icon' => 'category-1.gif'
            ], [
                'desc' => 'Varejo e Consumo',
                'urn' => 'varejo-e-consumo',
                'desktop_index' => '2',
                'mobile_index' => '6',
                'desktop_hex_bg' => 'category-2.svg',
                'mobile_hex_bg' => 'category-2.svg',
                'hex_icon' => 'category-2.svg',
                'hex_course_icon' => 'category-2.svg'
            ], [
                'desc' => 'Negócio e Gestão',
                'urn' => 'negocio-e-gestao',
                'desktop_index' => '3',
                'mobile_index' => '12',
                'desktop_hex_bg' => 'category-3.svg',
                'mobile_hex_bg' => 'category-3.svg',
                'hex_icon' => 'category-3.gif',
                'hex_course_icon' => 'category-3.gif'
            ], [
                'desc' => 'Direito',
                'urn' => 'direito',
                'desktop_index' => '4',
                'mobile_index' => '7',
                'desktop_hex_bg' => 'category-4.svg',
                'mobile_hex_bg' => 'category-4.svg',
                'hex_icon' => 'category-4.gif',
                'hex_course_icon' => 'category-4.gif'
            ], [
                'desc' => 'Controladoria e Contabilidade',
                'urn' => 'controladoria-e-contabilidade',
                'desktop_index' => '5',
                'mobile_index' => '2',
                'desktop_hex_bg' => 'category-5.svg',
                'mobile_hex_bg' => 'category-5.svg',
                'hex_icon' => 'category-5.gif',
                'hex_course_icon' => 'category-5.gif'
            ], [
                'desc' => 'T.I. e Softwares',
                'urn' => 'ti-e-softwares',
                'desktop_index' => '6',
                'mobile_index' => '3',
                'desktop_hex_bg' => 'category-6.svg',
                'mobile_hex_bg' => 'category-6.svg',
                'hex_icon' => 'category-6.gif',
                'hex_course_icon' => 'category-6.gif'
            ], [
                'desc' => 'Marketing',
                'urn' => 'marketing',
                'desktop_index' => '7',
                'mobile_index' => '8',
                'desktop_hex_bg' => 'category-7.svg',
                'mobile_hex_bg' => 'category-7.svg',
                'hex_icon' => 'category-7.gif',
                'hex_course_icon' => 'category-7.gif'
            ], [
                'desc' => 'Engenharia',
                'urn' => 'engenharia',
                'desktop_index' => '8',
                'mobile_index' => '13',
                'desktop_hex_bg' => 'category-8.svg',
                'mobile_hex_bg' => 'category-8.svg',
                'hex_icon' => 'category-8.gif',
                'hex_course_icon' => 'category-8.gif'
            ], [
                'desc' => 'Concursos e Certificação',
                'urn' => 'concursos-e-certificacao',
                'desktop_index' => '9',
                'mobile_index' => '14',
                'desktop_hex_bg' => 'category-9.svg',
                'mobile_hex_bg' => 'category-9.svg',
                'hex_icon' => 'category-9.gif',
                'hex_course_icon' => 'category-9.gif'
            ], [
                'desc' => 'Arquitetura e Design',
                'urn' => 'arquitetura-e-design',
                'desktop_index' => '10',
                'mobile_index' => '9',
                'desktop_hex_bg' => 'category-10.svg',
                'mobile_hex_bg' => 'category-10.svg',
                'hex_icon' => 'category-10.gif',
                'hex_course_icon' => 'category-10.gif'
            ], [
                'desc' => 'Saúde',
                'urn' => 'saude',
                'desktop_index' => '11',
                'mobile_index' => '4',
                'desktop_hex_bg' => 'category-11.svg',
                'mobile_hex_bg' => 'category-11.svg',
                'hex_icon' => 'category-11.gif',
                'hex_course_icon' => 'category-11.gif'
            ], [
                'desc' => 'História e Arte',
                'urn' => 'historia-e-arte',
                'desktop_index' => '12',
                'mobile_index' => '5',
                'desktop_hex_bg' => 'category-12.svg',
                'mobile_hex_bg' => 'category-12.svg',
                'hex_icon' => 'category-12.svg',
                'hex_course_icon' => 'category-12.svg'
            ], [
                'desc' => 'Ensino Médio e Fundamental',
                'urn' => 'ensino-medio-e-fundamental',
                'desktop_index' => '13',
                'mobile_index' => '10',
                'desktop_hex_bg' => 'category-13.svg',
                'mobile_hex_bg' => 'category-13.svg',
                'hex_icon' => 'category-13.svg',
                'hex_course_icon' => 'category-13.svg'
            ], [
                'desc' => 'Vídeo e Fotografia',
                'urn' => 'video-e-fotografia',
                'desktop_index' => '14',
                'mobile_index' => '15',
                'desktop_hex_bg' => 'category-14.svg',
                'mobile_hex_bg' => 'category-14.svg',
                'hex_icon' => 'category-14.gif',
                'hex_course_icon' => 'category-14.gif'
            ], [
                'desc' => 'Gastronomia',
                'urn' => 'gastronomia',
                'desktop_index' => '15',
                'mobile_index' => '16',
                'desktop_hex_bg' => 'category-15.svg',
                'mobile_hex_bg' => 'category-15.svg',
                'hex_icon' => 'category-15.gif',
                'hex_course_icon' => 'category-15.gif'
            ], [
                'desc' => 'Hobbies',
                'urn' => 'hobbies',
                'desktop_index' => '16',
                'mobile_index' => '11',
                'desktop_hex_bg' => 'category-16.svg',
                'mobile_hex_bg' => 'category-16.svg',
                'hex_icon' => 'category-16.gif',
                'hex_course_icon' => 'category-16.gif'
            ]
        ]);
    }
}