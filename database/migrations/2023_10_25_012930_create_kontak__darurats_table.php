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
        Schema::create('kontak__darurats', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('no_hp');
            $table->enum('hubungan', ['Suami', 'Istri', 'Orang Tua', 'Anak', 'Saudara']);
            $table->text('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontak__darurats');
    }
};
