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
        Schema::table(StringConvertorHelper::convertToSnakeSingleName('contact_lists'), function (Blueprint $table) {
            $table->boolean('has_account')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(StringConvertorHelper::convertToSnakeSingleName('contact_lists'), function (Blueprint $table) {
            //
        });
    }
};
