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
        Schema::create('shopline_stores', function (Blueprint $table) {
            $table->id();
            $table->string('store_id')->comment('Store ID');
            $table->string('app_host_name')->comment('app host name');
            $table->string('admin_access_token',1000)->comment('Admin Access Token');
            $table->string('client_id')->comment('Client ID');
            $table->string('client_secret')->comment('Client Secret');
            $table->integer('status')->comment("store status");
            $table->string("lang")->comment("language");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopline_stores');
    }
};
