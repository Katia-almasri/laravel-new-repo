<?php

use App\Helper\StringConvertorHelper;
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
        Schema::create(StringConvertorHelper::convertToSnakeSingleName('messages'), function (Blueprint $table) {
            $table->id();
            $table->text('content');

            $table->unsignedBigInteger('sender_id');
            $table->foreign('sender_id')->references('id')->on('user')->onDelete('cascade');

            $table->unsignedBigInteger('chat_id');
            $table->foreign('chat_id')->references('id')->on('chat')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(StringConvertorHelper::convertToSnakeSingleName('messages'));
    }
};
