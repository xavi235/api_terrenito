<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('propiedads', function (Blueprint $table) {
            $table->id('id_propiedad');
            $table->string('titulo');
            $table->text('descripcion');
            $table->float('tamano')->nullable();
            $table->decimal('precio_min', 10, 2);
            $table->decimal('precio_max', 10, 2);
            $table->string('zona');
            $table->integer('estado')->default(1);
            $table->string('Enlace_ubicacion')->nullable();
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_ubicacion');
            $table->unsignedBigInteger('id_tipo');
            $table->timestamps();

            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');
            $table->foreign('id_ubicacion')->references('id_ubicacion')->on('ubicacions')->onDelete('cascade');
            $table->foreign('id_tipo')->references('id_tipo')->on('tipo_propiedads')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('propiedads');
    }
};