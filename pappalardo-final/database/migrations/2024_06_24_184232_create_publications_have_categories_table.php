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
        Schema::create('publications_have_categories', function (Blueprint $table) {
            $table->foreignId('publication_fk')->constrained(table: 'publications', column: 'id');

            $table->unsignedSmallInteger('category_fk');
            $table->foreign('category_fk')->references('category_id')->on('categories');
            $table->primary(['publication_fk', 'category_fk']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publications_have_categories');
    }
};
