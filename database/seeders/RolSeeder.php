<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rols')->insert([
            ['id_rol' => 1, 'nombre' => 'Administrador', 'descripcion' => 'Rol con acceso completo'],
            ['id_rol' => 2, 'nombre' => 'Vendedor', 'descripcion' => 'Rol con permisos de venta'],
            ['id_rol' => 3, 'nombre' => 'Premium', 'descripcion' => 'Rol con privilegios especiales'],
            ['id_rol' => 4, 'nombre' => 'Usuario', 'descripcion' => 'Rol estándar de usuario'],
        ]);
    }
}
