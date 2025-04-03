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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->constrained()->onDelete('cascade');
            $table->string('name', 100)->index();
            $table->string('preference', 500)->nullable();
            $table->string('progress', 500)->nullable();
            $table->string('good', 500)->nullable();
            $table->string('bad', 500)->nullable();
            $table->string('memo', 500)->nullable();
            $table->string('site_name', 500)->nullable();
            $table->string('url', 1000)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
