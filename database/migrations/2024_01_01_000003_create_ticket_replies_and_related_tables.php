<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ticket_replies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->longText('message');
            $table->boolean('is_internal')->default(false);
            $table->boolean('is_read')->default(false);
            $table->timestamps();
            $table->index('ticket_id');
            $table->index('user_id');
            $table->index('is_internal');
            $table->index('created_at');
        });

        Schema::create('ticket_tags', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('color')->nullable();
        });

        Schema::create('ticket_tag', function (Blueprint $table) {
            $table->foreignId('ticket_id')->constrained()->onDelete('cascade');
            $table->foreignId('tag_id')->constrained('ticket_tags')->onDelete('cascade');
            $table->primary(['ticket_id', 'tag_id']);
        });

        Schema::create('ticket_attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('reply_id')->nullable()->constrained('ticket_replies')->onDelete('cascade');
            $table->string('file_name');
            $table->string('file_path');
            $table->unsignedBigInteger('file_size');
            $table->string('file_type')->nullable();
            $table->string('mime_type')->nullable();
            $table->timestamps();
            $table->index('ticket_id');
            $table->index('reply_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ticket_attachments');
        Schema::dropIfExists('ticket_tag');
        Schema::dropIfExists('ticket_tags');
        Schema::dropIfExists('ticket_replies');
    }
};
