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
        Schema::create(StringConvertorHelper::convertToSnakeSingleName('chats'), function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('description');
            $table->boolean('is_group')->default(false);

            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')->references('id')->on('user')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(StringConvertorHelper::convertToSnakeSingleName('chats'));
    }
};
