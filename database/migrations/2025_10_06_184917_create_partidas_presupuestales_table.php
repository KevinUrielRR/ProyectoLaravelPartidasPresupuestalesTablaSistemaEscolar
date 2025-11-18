<?php

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
       Schema::create('partidas_presupuestales', function (Blueprint $table) {
            $table->char('partida',4)->primary();
            $table->string('nombre_partida',100)->nullable();
            $table->text('descripcion_partida')->nullable();
            $table->char('estado_partida',1);
            $table->char('nivel_partida',1)->nullable();
});

}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partidas_presupuestales');
    }
};
