<?php

use App\Models\Cliente;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('equipos', function (Blueprint $table) {
        $table->id();
        $table->string('marca');
        $table->string('modelo');
        $table->unsignedBigInteger('cliente_id');
        $table->timestamps();

        $table->foreign('cliente_id')
              ->references('id')
              ->on('Clientes')
              ->onDelete('cascade'); // ¡Parámetro añadido!
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
