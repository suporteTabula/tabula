<?php

use Illuminate\Database\Seeder;

class CourseItemTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");
        DB::table("course_item_types")->insert([
        	[
        		"name"			=> "video",
        		"created_at"	=> $now,
        		"updated_at"	=> $now,	
        	], [
        		"name"			=> "imagem",
        		"created_at"	=> $now,
        		"updated_at"	=> $now,
        	], [
        		"name"			=> "texto",
        		"created_at"	=> $now,
        		"updated_at"	=> $now,
        	], [
        		"name"			=> "audio",
        		"created_at"	=> $now,
        		"updated_at"	=> $now,
        	], [
                "name"          => "dissertativa",
                "created_at"    => $now,
                "updated_at"    => $now,
            ], [
                "name"          => "multipla_escolha",
                "created_at"    => $now,
                "updated_at"    => $now,
            ], [
                "name"          => "prova",
                "created_at"    => $now,
                "updated_at"    => $now,
            ], [
                "name"          => "truefalse",
                "created_at"    => $now,
                "updated_at"    => $now,
            ],	[
            	"name"			=> "alternativas",
            	"created_at"    => $now,
                "updated_at"    => $now,
            ],  [
                "name"          => "complemento",
                "created_at"    => $now,
                "updated_at"    => $now,
            ]
        ]);
    }
}
