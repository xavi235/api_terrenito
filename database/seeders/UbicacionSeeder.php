<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class UbicacionSeeder extends Seeder
{
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('ubicacions')->truncate();
        Schema::enableForeignKeyConstraints();  
        
        DB::table('ubicacions')->insert([
            ['id_ubicacion' => 1, 'direccion_detallada' => 'Calle 1, Zona Norte', 'provincia' => 'Santa Cruz'],
            ['id_ubicacion' => 2, 'direccion_detallada' => 'Av. Arce 234', 'provincia' => 'La Paz'],
            ['id_ubicacion' => 3, 'direccion_detallada' => 'Barrio El Carmen', 'provincia' => 'Cochabamba'],
            ['id_ubicacion' => 4, 'direccion_detallada' => 'Zona Sur 5ta', 'provincia' => 'Sucre'],
            ['id_ubicacion' => 5, 'direccion_detallada' => 'Avenida Blanco Galindo', 'provincia' => 'Cochabamba'],
            ['id_ubicacion' => 6, 'direccion_detallada' => 'Urbanización Las Palmas', 'provincia' => 'Santa Cruz'],
            ['id_ubicacion' => 7, 'direccion_detallada' => 'Calle Comercio', 'provincia' => 'Oruro'],
            ['id_ubicacion' => 8, 'direccion_detallada' => 'Av. Circunvalación', 'provincia' => 'Tarija'],
            ['id_ubicacion' => 9, 'direccion_detallada' => 'Zona Universitaria', 'provincia' => 'Potosí'],
            ['id_ubicacion' => 10, 'direccion_detallada' => 'Centro Histórico', 'provincia' => 'La Paz'],
        ]);
    }
}
