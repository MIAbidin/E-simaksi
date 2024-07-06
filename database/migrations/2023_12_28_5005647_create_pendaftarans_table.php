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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('registration_id')->unique();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pendaki_id');
            $table->unsignedBigInteger('trail_id');
            $table->date('tanggal_naik');
            $table->date('tanggal_turun');
            $table->enum('status', ['Paid', 'Unpaid', 'Expired']);
            $table->string('name');
            $table->bigInteger('no_hp');
            $table->enum('hubungan', ['Suami', 'Istri', 'Orang Tua', 'Anak', 'Saudara']);
            $table->text('alamat');
            $table->text('qr_code')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pendaki_id')->references('id')->on('pendakis');
            $table->foreign('trail_id')->references('id')->on('trails');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
