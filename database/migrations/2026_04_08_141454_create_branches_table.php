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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->cascadeOnDelete();
            $table->string('cnpj', 20)->unique();
            $table->string('logo')->nullable();
            $table->string('name');
            $table->string('zip_code', 10)->nullable();
            $table->string('street')->nullable();
            $table->string('number', 20)->nullable();
            $table->string('district')->nullable();
            $table->string('city')->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
