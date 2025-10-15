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
        Schema::create('ports', function (Blueprint $table) {
    $table->id();
    $table->string('name', 100);
    $table->string('country', 50);
    $table->string('coordinates', 50); // e.g. "1.2921° S, 36.8219° E"
    $table->integer('docking_capacity')->unsigned()->nullable();
    $table->boolean('customs_authorized')->default(false);
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ports');
    }
};
