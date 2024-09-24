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
        Schema::table('order_payment', function (Blueprint $table) {
            //
            $table->tinyInteger('version')->default(0)->after('additional')->comment("version default 0");
            $table->index('version');
            $table->index('method');
            $table->string('method', 50)->change();
            $table->string('method_title', 50)->change();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_payment', function (Blueprint $table) {
            //
            $table->dropColumn('version');
        });
    }
};
