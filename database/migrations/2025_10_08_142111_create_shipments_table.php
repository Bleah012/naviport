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

    // Define the column first
    $table->unsignedBigInteger('cargo_id')->nullable();
    $table->foreign('cargo_id')->references('id')->on('cargos')->onDelete('set null');

    // These are fine as-is
    $table->foreignId('ship_id')->constrained()->onDelete('cascade');
    $table->foreignId('origin_port_id')->constrained('ports')->onDelete('cascade');
    $table->foreignId('destination_port_id')->constrained('ports')->onDelete('cascade');

    $table->date('departure_date');
    $table->date('arrival_date')->nullable();
    $table->string('status', 20)->default('scheduled');
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
