<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->id();
            $table->foreignId('follower_id')->constrained('users')->onDelete('cascade'); // the user who is following
            $table->foreignId('followed_id')->constrained('users')->onDelete('cascade'); // the user being followed
            $table->timestamps();
    
            // Ensure a user can't follow themselves and a user can follow another user only once
            $table->unique(['follower_id', 'followed_id']);
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('follows');
    }
};
