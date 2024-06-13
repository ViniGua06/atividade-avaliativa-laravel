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
        Schema::table('airplanes', function (Blueprint $table) {
            $table->string("nacao")->nullable();
            $table->string("tipo")->nullable();
            $table->double("velocidade_maxima")->nullable();
            $table->boolean("produzida")->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('airplanes', function (Blueprint $table) {
            //
        });
    }
};
