<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('paket_wisatas')) {
            Schema::create('paket_wisatas', function (Blueprint $table) {
                $table->id('paket_id');
                $table->string('nama_paket');
                $table->string('kuota_minimal');
                $table->text('deskripsi');
                $table->integer('harga');
                $table->boolean('include_susu')->default(false);
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('paket_wisatas');
    }
};
