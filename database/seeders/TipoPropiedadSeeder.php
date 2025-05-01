<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class TipoPropiedadSeeder extends Seeder
{
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('tipo_propiedads')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('tipo_propiedads')->insert([
            ['id_tipo' => 1, 'nombre' => 'Casa'],
            ['id_tipo' => 2, 'nombre' => 'Terreno'],
            ['id_tipo' => 3, 'nombre' => 'Alquiler'],
           
        ]);
    }
}
