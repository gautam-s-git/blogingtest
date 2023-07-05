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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('content');
            $table->longText('slug');
            $table->enum('is_valid',['yes','no'])->dafault('yes');
            $table->foreignId('user_id')->constrained('users');
            $table->unsignedBigInteger('comment_count')->default('0');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('posts');
    }
};
