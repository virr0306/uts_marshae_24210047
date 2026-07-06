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
        Schema::create('kelas', function (Blueprint $table) {

            $table->id();

            $table->string('kode_kelas')->unique();

            // Relasi ke Mata Kuliah
            $table->foreignId('kode_mata_kuliah')
                ->constrained('mata_kuliahs')
                ->cascadeOnDelete();

            // Relasi ke Dosen
            $table->foreignId('kode_dosen')
                ->constrained('dosens')
                ->cascadeOnDelete();

            $table->enum('hari', [
                'Senin',
                'Selasa',
                'Rabu',
                'Kamis',
                'Jumat',
                'Sabtu'
            ]);

            $table->enum('jam', [
                '08:00 - 09:40',
                '09:50 - 11:30',
                '12:30 - 14:10',
                '17:00 - 18:40',
                '19:00 - 20:40'
            ]);

            $table->string('tahun_ajaran');

            $table->string('ruang_kelas');

            $table->unsignedInteger('jumlah_max');

            $table->unsignedInteger('jumlah_mahasiswa')
                ->default(0);

            $table->enum('semester', [
                'Ganjil',
                'Genap'
            ]);

            $table->timestamps();

            // Mencegah dosen mengajar dua kelas pada waktu yang sama
            $table->unique([
                'kode_dosen',
                'hari',
                'jam',
                'tahun_ajaran',
                'semester'
            ]);

            // Mencegah satu ruangan dipakai dua kelas bersamaan
            $table->unique([
                'ruang_kelas',
                'hari',
                'jam',
                'tahun_ajaran',
                'semester'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};