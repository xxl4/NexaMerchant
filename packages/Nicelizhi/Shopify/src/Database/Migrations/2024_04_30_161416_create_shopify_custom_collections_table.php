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
        Schema::create('shopify_custom_collections', function (Blueprint $table) {
            $table->id();
            $table->string('shopify_store_id');
            $table->string('collection_id');
            $table->string('title');
            $table->string('handle');
            $table->text('body_html')->nullable();
            $table->string('sprt_order');
            $table->string('published_scope')->nullable();
            $table->string('template_suffix')->nullable();
            $table->string('admin_graphql_api_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopify_custom_collections');
    }
};
