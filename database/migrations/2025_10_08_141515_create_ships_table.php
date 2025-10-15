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
        $table->string('name', 100);
        $table->string('registration_number', 30)->unique();
        $table->integer('capacity')->unsigned(); // assuming positive values
        $table->string('type', 50)->nullable();
        $table->string('status', 20)->default('active');
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
