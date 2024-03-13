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
        Schema::create('sistemas', function (Blueprint $table) {
            $table->id();
            $table->string('leyendaboleta')->nullable();
            $table->string('dato1')->nullable();
            $table->string('dato2')->nullable();
            $table->string('dato3')->nullable();
            $table->string('dato4')->nullable();
            $table->string('dato5')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sistemas');
    }
};
