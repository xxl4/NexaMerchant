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
        Schema::table('shopify_stores', function (Blueprint $table) {
            $table->index('shopify_store_id');
        });
        Schema::table('shopify_products', function (Blueprint $table) {
            $table->index('shopify_store_id');
            $table->index('product_id');
            $table->index(['shopify_store_id','product_id']);
        });
        Schema::table('shopify_orders', function (Blueprint $table) {
            $table->unique('shopify_store_id','shopify_order_id','order_id')->unique();
            $table->index("shopify_store_id");
            $table->index("shopify_order_id");
            $table->index("order_id");
            $table->index(['shopify_store_id','shopify_order_id']);
            $table->index(['order_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
