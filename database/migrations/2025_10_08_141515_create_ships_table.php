<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('ships', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('registration_number')->unique();
        $table->integer('capacity');
        $table->string('type')->nullable();
        $table->string('status')->default('active');
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ships');
    }
};
