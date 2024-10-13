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
        Schema::table(StringConvertorHelper::convertToSnakeSingleName('chat'), function (Blueprint $table) {
            $table->string('description')->nullable()->change();
            $table->string('name')->nullable()->change();
            $table->text('first_name')->nullable()->change();
            $table->text('last_name')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(StringConvertorHelper::convertToSnakeSingleName('chat'), function (Blueprint $table) {
            //
        });
    }
};
