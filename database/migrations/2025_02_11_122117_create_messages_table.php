<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('messages', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->foreignId('room_id')->constrained('rooms')->onDelete('cascade'); 
            $table->foreignId('sender_id')->constrained('users')->onDelete('cascade'); 
            $table->text('message'); // Message content
            $table->boolean('is_read')->default(false); // Message read status
            $table->timestamps(); // Adds 'created_at' and 'updated_at'
        });
    }

    public function down() {
        Schema::dropIfExists('messages');
    }
};

  
