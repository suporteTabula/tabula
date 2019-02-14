<?php

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");
        DB::table("states")->insert([
            [
                "name"       => "São Paulo",
                "country_id" => '1',
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Acre",
                "country_id" => '1',
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Amazonas",
                "country_id" => '1',
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Roraima",
                "country_id" => '1',
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Pará",
                "country_id" => '1',
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Amapá",
                "country_id" => '1',
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Tocantins",
                "country_id" => '1',
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Maranhão",
                "country_id" => '1',
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Piauí",
                "country_id" => '1',
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Ceará",
                "country_id" => '1',
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Rio Grande do Norte",
                "country_id" => '1',
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Paraíba",
                "country_id" => '1',
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Pernambuco",
                "country_id" => '1',
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Alagoas",
                "country_id" => '1',
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Sergipe",
                "country_id" => '1',
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Bahia",
                "country_id" => '1',
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Minas Gerais",
                "country_id" => '1',
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Espírito Santo",
                "country_id" => '1',
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Rio de Janeiro",
                "country_id" => '1',
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Rondônia",
                "country_id" => '1',
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Paraná",
                "country_id" => '1',
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Santa Catarina",
                "country_id" => '1',
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Rio Grande do Sul",
                "country_id" => '1',
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Mato Grosso do Sul",
                "country_id" => '1',
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Mato Grosso",
                "country_id" => '1',
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Goiás",
                "country_id" => '1',
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Distrito Federal",
                "country_id" => '1',
                "created_at" => $now,
                "updated_at" => $now,
            ],
        ]);
    }
}
