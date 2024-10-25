<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('desc', 500)->nullable();
            $table->string('author', 50)->nullable();
            $table->boolean('read')->default(false);
            $table->integer('pages');
            $table->integer('current_page')->nullable()->default(0);
            $table->date('start_date_read')->nullable();
            $table->date('end_date_read')->nullable();
            $table->string('img', 5000)->nullable();
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
