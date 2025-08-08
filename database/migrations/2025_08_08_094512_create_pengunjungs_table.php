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
        if (!Schema::hasTable('pengunjungs')) {
            Schema::create('pengunjungs', function (Blueprint $table) {
                $table->id('pengunjung_id');
                $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            });
        }
    }

  
    public function down(): void
    {
        Schema::dropIfExists('pengunjungs');
    }
};
