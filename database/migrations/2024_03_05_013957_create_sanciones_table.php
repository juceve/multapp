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
        Schema::create('sanciones', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->foreignId('socio_id')->constrained();
            $table->foreignId('caseta_id')->constrained();
            $table->foreignId('causale_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->string('causal');
            $table->decimal('importe', 10, 2);
            $table->enum('estadopago', ['IMPAGO', 'PAGADO']);
            $table->longText('url')->nullable();
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanciones');
    }
};
