<?php

use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");
        DB::table("pages")->insert([
            [
                "type_page"       => "Central de Ajuda",
                "desc"	 => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula. Vestibulum ac tempor turpis, sit amet fermentum justo. Proin at dignissim purus. Suspendisse efficitur maximus lorem, vitae auctor magna pharetra id. Duis lobortis viverra rhoncus. Vivamus molestie est sit amet rutrumLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula.",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "type_page"       => "Perguntas Frequentes",
                "desc"	 => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula. Vestibulum ac tempor turpis, sit amet fermentum justo. Proin at dignissim purus. Suspendisse efficitur maximus lorem, vitae auctor magna pharetra id. Duis lobortis viverra rhoncus. Vivamus molestie est sit amet rutrumLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula.",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "type_page"       => "Termos e Condições",
                "desc"	 => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula. Vestibulum ac tempor turpis, sit amet fermentum justo. Proin at dignissim purus. Suspendisse efficitur maximus lorem, vitae auctor magna pharetra id. Duis lobortis viverra rhoncus. Vivamus molestie est sit amet rutrumLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula.",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "type_page"       => "Política de Privacidade",
                "desc"	 => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula. Vestibulum ac tempor turpis, sit amet fermentum justo. Proin at dignissim purus. Suspendisse efficitur maximus lorem, vitae auctor magna pharetra id. Duis lobortis viverra rhoncus. Vivamus molestie est sit amet rutrumLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula.",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "type_page"       => "Admin",
                "desc"	 => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula. Vestibulum ac tempor turpis, sit amet fermentum justo. Proin at dignissim purus. Suspendisse efficitur maximus lorem, vitae auctor magna pharetra id. Duis lobortis viverra rhoncus. Vivamus molestie est sit amet rutrumLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula.",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "type_page"       => "Política de Propriedade Intelectual",
                "desc"	 => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula. Vestibulum ac tempor turpis, sit amet fermentum justo. Proin at dignissim purus. Suspendisse efficitur maximus lorem, vitae auctor magna pharetra id. Duis lobortis viverra rhoncus. Vivamus molestie est sit amet rutrumLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula.",
                "created_at" => $now,
                "updated_at" => $now,
            ], 
        ]);
    }
}
