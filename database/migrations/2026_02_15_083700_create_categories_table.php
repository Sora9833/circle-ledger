<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            // income / expense
            $table->string('type', 10);

            // 区分名
            $table->string('name');

            // 並び順（任意）
            $table->unsignedSmallInteger('sort_order')->default(0);

            $table->timestamps();

            $table->index(['type', 'sort_order']);
            $table->unique(['type', 'name']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};