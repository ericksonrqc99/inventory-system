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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('iso2', 10)->unique();
            $table->string('phonecode', 10)->unique();
            $table->string('capital', 50)->unique();
            $table->string('currency', 10);
            $table->string('currency_symbol', 10);
            $table->string('native', 50)->unique();
            $table->json('timezones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
