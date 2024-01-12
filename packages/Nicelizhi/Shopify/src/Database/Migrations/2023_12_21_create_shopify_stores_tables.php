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
        Schema::create('shopify_stores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shopify_store_id')->comment('Shopify Store ID');
            $table->string('shopify_app_host_name')->comment('Shopify app host name');
            $table->string('shopify_admin_access_token')->comment('Shopify Admin Access Token');
            $table->string('shopify_client_id')->comment('Shopify Client ID');
            $table->string('shopify_client_secret')->comment('Shopify Client Secret');
            $table->integer('status');
            
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopify_stores');
    }
};
