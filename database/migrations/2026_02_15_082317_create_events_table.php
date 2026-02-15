<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            // イベント名（例：第2回演奏会 / 通常会計）
            $table->string('name');

            // 会計年度（例：2026）
            $table->unsignedSmallInteger('fiscal_year');

            // 開始日・終了日（任意）
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            // メモ（任意）
            $table->text('note')->nullable();

            // 作成者
            $table->foreignId('created_by')->constrained('users');

            $table->timestamps();
            $table->softDeletes();

            // よく使う検索用
            $table->index(['fiscal_year', 'start_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};

