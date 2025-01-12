<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('tasks');
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('desc', 500)->nullable();
            $table->bigInteger('status_task_id')->unsigned();
            $table->string('priority')->default('normal');
            $table->string('img', 5000)->nullable();
            $table->foreign("status_task_id")->references("id")->on("status_task"); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
