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
        Schema::create('apps', function (Blueprint $table) {
            $table->id();
            $table->string("name")->comment("name");
            $table->string('slug')->comment('slug');
            $table->string('code')->comment("apps code");
            $table->string("description")->nullable()->comment("description");
            $table->string("version")->comment("version");
            $table->string("author")->nullable()->comment("author");
            $table->char("email", 50)->nullable()->comment("email");
            $table->string("url")->nullable()->comment("url");
            $table->string("icon")->nullable()->comment("icon");
            $table->enum("status",['enable','apply','disable'])->default("apply")->comment("status");
            $table->string("type")->nullable()->comment("type");
            $table->string("category")->nullable()->comment("category");
            $table->string("tags")->nullable()->comment("tags");
            $table->decimal("price", 8, 2)->default('0.00')->nullable()->comment("price");
            $table->char("license", 20)->nullable()->comment("license");
            $table->char("require", 20)->nullable()->comment("require");
            $table->char("require_php", 20)->nullable()->comment("require_php");
            $table->char("require_laravel", 20)->nullable()->comment("require_wp");
            $table->char("require_mysql", 20)->nullable()->comment("require_mysql");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('apps');
    }
};
