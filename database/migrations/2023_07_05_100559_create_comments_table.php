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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->longText('content');
            $table->unsignedBigInteger('parent_id')->default(0);
            $table->foreignId('post_id')->constrained('posts');
            $table->foreignid('user_id')->constrained('users');
            $table->enum('is_valid',['yes','no'])->default('yes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('comments');
    }
};
