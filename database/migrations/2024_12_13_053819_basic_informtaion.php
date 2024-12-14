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
        Schema::create('basic_info_user', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('active', ['active', 'inactive'])->default('active');
            $table->string('email')->unique();
            $table->string('mobile')->unique();
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('pincode');
            $table->string('role');
            $table->longText('about');
            $table->string('facebook_id')->nullable();
            $table->string('github_id')->nullable();
            $table->string('linked_in_id')->nullable();
            $table->string('image_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basic_info_user');
        
    }
};
