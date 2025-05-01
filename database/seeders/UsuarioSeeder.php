<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        
        Schema::disableForeignKeyConstraints();

       
        DB::table('usuarios')->truncate();

        
        Schema::enableForeignKeyConstraints();

       
        DB::table('usuarios')->insert([
            [
                'id_usuario' => 1,
                'nombre_usuario' => 'Juan Pérez',
                'correo' => 'juan@example.com',
                'contraseña' => Hash::make('password123'),
                'contacto' => '71234567',
                'id_rol' => 1,
            ],
            [
                'id_usuario' => 2,
                'nombre_usuario' => 'Ana López',
                'correo' => 'ana@example.com',
                'contraseña' => Hash::make('password123'),
                'contacto' => '72345678',
                'id_rol' => 2,
            ],
            [
                'id_usuario' => 3,
                'nombre_usuario' => 'Carlos Díaz',
                'correo' => 'carlos@example.com',
                'contraseña' => Hash::make('password123'),
                'contacto' => '73456789',
                'id_rol' => 3,
            ],
            [
                'id_usuario' => 4,
                'nombre_usuario' => 'María Gómez',
                'correo' => 'maria@example.com',
                'contraseña' => Hash::make('password123'),
                'contacto' => '74567890',
                'id_rol' => 4,
            ],
            [
                'id_usuario' => 5,
                'nombre_usuario' => 'Pedro Ramos',
                'correo' => 'pedro@example.com',
                'contraseña' => Hash::make('password123'),
                'contacto' => '75678901',
                'id_rol' => 2,
            ],
            [
                'id_usuario' => 6,
                'nombre_usuario' => 'Laura Cruz',
                'correo' => 'laura@example.com',
                'contraseña' => Hash::make('password123'),
                'contacto' => '76789012',
                'id_rol' => 3,
            ],
            [
                'id_usuario' => 7,
                'nombre_usuario' => 'Miguel Salas',
                'correo' => 'miguel@example.com',
                'contraseña' => Hash::make('password123'),
                'contacto' => '77890123',
                'id_rol' => 4,
            ],
            [
                'id_usuario' => 8,
                'nombre_usuario' => 'Paula Jiménez',
                'correo' => 'paula@example.com',
                'contraseña' => Hash::make('password123'),
                'contacto' => '78901234',
                'id_rol' => 1,
            ],
            [
                'id_usuario' => 9,
                'nombre_usuario' => 'Luis Castillo',
                'correo' => 'luis@example.com',
                'contraseña' => Hash::make('password123'),
                'contacto' => '79012345',
                'id_rol' => 2,
            ],
            [
                'id_usuario' => 10,
                'nombre_usuario' => 'Diana Torres',
                'correo' => 'diana@example.com',
                'contraseña' => Hash::make('password123'),
                'contacto' => '70123456',
                'id_rol' => 4,
            ],
        ]);
    }
}
