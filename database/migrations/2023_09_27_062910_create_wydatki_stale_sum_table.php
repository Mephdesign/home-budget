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
        Schema::create('wydatki_stale_sum', function (Blueprint $table) {
            $table->id();
            $table->decimal('kwota','10','2');
            $table->decimal('pozostalo','10','2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wydatki_stale_sum');
    }
};
