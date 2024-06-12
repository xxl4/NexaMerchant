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
        Schema::table('order_disputes', function (Blueprint $table) {
            //
            $table->char('platform', 100)->after("dispute_id")->default('paypal')->comment('payment platform type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_disputes', function (Blueprint $table) {
            //
            $table->dropColumn('platform');
        });
    }
};
