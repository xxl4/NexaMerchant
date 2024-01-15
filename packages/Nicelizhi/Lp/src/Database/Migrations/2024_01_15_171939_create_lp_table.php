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
        Schema::create('lps', function (Blueprint $table) {
            $table->id();
            $table->string("name")->comment("Lp name");
            $table->string('slug')->comment('Lp slug');
            $table->tinyInteger("status")->comment("lp status use 1 and 0");
            $table->longText("html")->nullable()->comment("LP html code");

            $table->unique("slug");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lps');
    }
};
