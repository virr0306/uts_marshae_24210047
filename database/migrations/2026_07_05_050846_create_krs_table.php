<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('krs_detail', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('krs_id');

            $table->unsignedBigInteger('kelas_id');

            $table->enum('status',[
                'pending',
                'approved',
                'declined'
            ])->default('pending');

            $table->timestamps();

            $table->foreign('krs_id')
                  ->references('id')
                  ->on('krs')
                  ->cascadeOnDelete();

            $table->foreign('kelas_id')
                  ->references('id')
                  ->on('kelas')
                  ->cascadeOnDelete();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('krs_detail');
    }
};