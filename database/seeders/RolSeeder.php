<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RolSeeder extends Seeder
{
    public function run()
    {
        
        Schema::disableForeignKeyConstraints();

      
        DB::table('rols')->truncate();

        
        Schema::enableForeignKeyConstraints();

        
        DB::table('rols')->insert([
            ['id_rol' => 1, 'nombre' => 'Administrador', 'descripcion' => 'Rol con acceso completo'],
            ['id_rol' => 2, 'nombre' => 'Vendedor', 'descripcion' => 'Rol con permisos de venta'],
            ['id_rol' => 3, 'nombre' => 'Premium', 'descripcion' => 'Rol con privilegios especiales'],
            ['id_rol' => 4, 'nombre' => 'Usuario', 'descripcion' => 'Rol estándar de usuario'],
        ]);
    }
}
