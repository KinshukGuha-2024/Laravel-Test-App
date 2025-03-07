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
        Schema::create('access_informations', function(Blueprint $table) {
            $table->id();
            $table->string('user_agent');
            $table->string('device_type');
            $table->string('browser');
            $table->string('os');
            $table->string('ip_address');
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('timezone')->nullable();
            $table->string('state')->nullable();
            $table->string('visited_url')->nullable();
            $table->string('referrer_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('access_informations');
    }
};
