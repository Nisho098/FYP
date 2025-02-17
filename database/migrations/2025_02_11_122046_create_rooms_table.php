<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('recruiter_id')->constrained('users')->onDelete('cascade');
            $table->timestamps(); // Adds 'created_at' and 'updated_at'
            $table->unique(['student_id', 'recruiter_id']); // Ensures one conversation per pair
        });
    }

    public function down() {
        Schema::dropIfExists('rooms');
    }
};
