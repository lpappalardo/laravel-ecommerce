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
        Schema::create('users_have_books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_fk')->constrained(table: 'users', column: 'id');

            $table->foreignId('book_fk')->constrained(table: 'books', column: 'id');

            // $table->primary(['user_fk', 'book_fk']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_have_books');
    }
};
