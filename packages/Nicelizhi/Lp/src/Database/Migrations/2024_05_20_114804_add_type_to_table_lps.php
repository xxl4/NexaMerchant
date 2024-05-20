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
        Schema::table('lps', function (Blueprint $table) {
            //
            $table->char('type', 100)->after("goto_url")->default('customize')->comment('lp type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lps', function (Blueprint $table) {
            //
            $table->dropColumn('type');
        });
    }
};
