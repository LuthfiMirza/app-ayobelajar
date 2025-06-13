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
        Schema::create('chat_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('session_id')->index();
            $table->enum('message_type', ['user', 'assistant']);
            $table->text('message_content');
            $table->json('message_metadata')->nullable(); // untuk menyimpan info tambahan seperti file yang diupload
            $table->timestamp('sent_at');
            $table->timestamps();
            
            $table->index(['user_id', 'session_id', 'sent_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_histories');
    }
};
