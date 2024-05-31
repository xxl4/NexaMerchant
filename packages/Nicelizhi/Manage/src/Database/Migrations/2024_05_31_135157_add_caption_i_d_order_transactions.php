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
        //
        Schema::table('order_transactions', function (Blueprint $table) {
            //
            $table->string('captures_id', 50)->after('order_id')->comment("captures id")->nullable();

            $table->index('captures_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('order_transactions', function (Blueprint $table) {
            //
            $table->dropColumn('captures_id');
        });
    }
};
