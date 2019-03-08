<?php

use Illuminate\Database\Seeder;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");
        DB::table("user_types")->insert([
            [
                "desc"       => "Admin",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "desc"       => "Aluno",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "desc"       => "Professor",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "desc"       => "Suporte",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "desc"       => "Empresa",
                "created_at" => $now,
                "updated_at" => $now,
            ], 
        ]);
    }
}
