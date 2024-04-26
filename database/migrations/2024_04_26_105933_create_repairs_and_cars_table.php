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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->uuid();
        });

        Schema::create('repairs', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->timestamps();
            $table->string('name');
            $table->integer('km_interval');
            $table->float('month_time_interval');
            $table->boolean('is_notified');
            $table->foreignId('car_id')->nullable(false)->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repairs');
        Schema::dropIfExists('cars');
    }
};
