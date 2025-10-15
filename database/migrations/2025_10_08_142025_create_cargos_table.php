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
        Schema::create('cargos', function (Blueprint $table) {

    $table->id();
    $table->text('description');
    $table->decimal('weight', 8, 2); // up to 999,999.99 kg
    $table->decimal('volume', 8, 2)->nullable();
    $table->string('cargo_type', 30)->nullable();
    $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cargos');
    }
};
