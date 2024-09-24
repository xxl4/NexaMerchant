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
        Schema::table('product_reviews', function (Blueprint $table) {
            //
            $table->tinyInteger('sort')->default(0)->after('customer_id')->comment("sort default 0");
            $table->char('status', 50)->change();
            $table->char('name', 50)->change();
            //$table->tinyInteger('rating')->change();
            $table->index("status");
            $table->index("sort");
            $table->index("product_id");
            $table->index("customer_id");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_reviews', function (Blueprint $table) {
            //
            $table->dropColumn('sort');
        });
    }
};
