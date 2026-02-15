<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            // ※すでに id と timestamps はある前提

            $table->foreignId('event_id')->after('id')->constrained('events');
            $table->string('type', 10)->after('event_id'); // income / expense
            $table->date('occurred_on')->after('type');

            $table->string('input_by')->after('occurred_on');
            $table->string('actor')->nullable()->after('input_by');

            $table->foreignId('category_id')->after('actor')->constrained('categories');

            $table->string('description')->nullable()->after('category_id');

            $table->unsignedInteger('amount')->after('description');
            $table->unsignedInteger('fee')->default(0)->after('amount');

            $table->foreignId('created_by')->after('fee')->constrained('users');

            $table->softDeletes()->after('updated_at');

            $table->index(['event_id', 'type', 'occurred_on']);
        });
    }

    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropIndex(['event_id', 'type', 'occurred_on']);

            $table->dropForeign(['created_by']);
            $table->dropForeign(['category_id']);
            $table->dropForeign(['event_id']);

            $table->dropColumn([
                'created_by',
                'fee',
                'amount',
                'description',
                'category_id',
                'actor',
                'input_by',
                'occurred_on',
                'type',
                'event_id',
                'deleted_at',
            ]);
        });
    }
};
