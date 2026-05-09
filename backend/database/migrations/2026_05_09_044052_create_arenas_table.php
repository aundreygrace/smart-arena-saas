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
        Schema::create('arenas', function (Blueprint $table) {
            $table->id();
        
            $table->foreignId('owner_id')
                ->constrained('users')
                ->cascadeOnDelete();
        
            $table->string('name');
            $table->string('slug')->unique();
        
            $table->text('description')->nullable();
        
            $table->string('city');
            $table->string('address');
        
            $table->decimal('price_per_hour', 12, 2);
        
            $table->integer('open_hour');
            $table->integer('close_hour');
        
            $table->boolean('is_active')->default(true);
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arenas');
    }
};
