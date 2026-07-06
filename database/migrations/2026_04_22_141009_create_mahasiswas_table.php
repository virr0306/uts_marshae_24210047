<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                  ->nullable()
                  ->constrained()
                  ->cascadeOnDelete();

            $table->string('fullname');

            $table->string('nim')->unique();

            $table->string('tempat_lahir')->nullable();

            $table->date('tanggal_lahir')->nullable();

            $table->text('alamat');

            $table->foreignId('jurusan_id')
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();

            $table->foreignId('kelas_id')
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};