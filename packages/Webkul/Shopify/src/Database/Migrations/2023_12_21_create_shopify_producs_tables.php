<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shopify_products', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('product_id');
            $table->string('title');
            $table->string('product_type');
            $table->text('body_html');
            $table->string('vendor');
            $table->string('handle');
            $table->dateTime('published_at');
            $table->string('template_suffix');
            $table->string('published_scope');
            $table->string('tags');
            $table->string('status');
            $table->string('admin_graphql_api_id');
            $table->text('variants');
            $table->text('options');
            $table->text('images');
            
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopify_products');
    }
};
