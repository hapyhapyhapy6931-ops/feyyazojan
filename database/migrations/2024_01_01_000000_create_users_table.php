<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->enum('role', ['user', 'support', 'moderator', 'admin'])->default('user');
            $table->boolean('is_banned')->default(false);
            $table->text('banned_reason')->nullable();
            $table->timestamp('banned_at')->nullable();
            $table->timestamp('last_seen_at')->nullable();
            $table->string('two_factor_secret')->nullable();
            $table->text('two_factor_recovery_codes')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->index('email');
            $table->index('role');
            $table->index('is_banned');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
