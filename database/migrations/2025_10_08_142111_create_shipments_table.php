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
        Schema::create('shipments', function (Blueprint $table) {
    $table->id();
    $table->foreignId('cargo_id')->constrained('cargo')->onDelete('cascade');
    $table->foreignId('ship_id')->constrained()->onDelete('cascade');
    $table->foreignId('origin_port_id')->constrained('ports')->onDelete('cascade');
    $table->foreignId('destination_port_id')->constrained('ports')->onDelete('cascade');
    $table->date('departure_date');
    $table->date('arrival_date')->nullable();
    $table->string('status')->default('scheduled');
    $table->text('delay_reason')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
