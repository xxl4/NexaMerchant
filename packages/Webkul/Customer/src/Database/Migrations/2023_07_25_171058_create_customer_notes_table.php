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
        Schema::create('customer_notes', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id')->unsigned()->nullable();
            $table->text('note');
            $table->boolean('customer_notified')->default(0);
            $table->timestamps();
<<<<<<< HEAD
            
=======

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_notes');
    }
};
