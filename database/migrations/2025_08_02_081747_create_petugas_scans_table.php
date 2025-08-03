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
        if (!Schema::hasTable('petugas_scans')) {
            Schema::create('petugas_scans', function (Blueprint $table) {
                $table->id('petugas_id');
                $table->string('nama');
                $table->string('username');
                $table->string('email');
                $table->string('no_hp');
                $table->string('password');
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petugas_scans');
    }
};
