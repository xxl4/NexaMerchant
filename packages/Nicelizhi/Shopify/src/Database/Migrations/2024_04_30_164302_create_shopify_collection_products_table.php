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
        Schema::create('shopify_collection_products', function (Blueprint $table) {
            $table->id();
            $table->string("shopify_store_id");
            $table->string("collection_id");
            $table->string("product_id");
            $table->string("position")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopify_collection_products');
    }
};
