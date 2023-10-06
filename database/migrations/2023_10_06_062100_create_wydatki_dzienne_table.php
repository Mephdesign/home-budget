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
        Schema::create('wydatki_dzienne', function (Blueprint $table) {
            $table->id();
            $table->integer('miesiac');
            $table->string('name');
            $table->decimal('kwota','10','2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wydatki_dzienne');
    }
};
