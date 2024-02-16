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
        Schema::create('shopline_products', function (Blueprint $table) {
            $table->id();
            $table->char("product_id", 32);
            $table->string("store_id");
            $table->text("body_html");
            $table->string("title", 250);
            $table->text('variants');
            $table->text('options');
            $table->text('images');
            $table->text('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopline_products');
    }
};
