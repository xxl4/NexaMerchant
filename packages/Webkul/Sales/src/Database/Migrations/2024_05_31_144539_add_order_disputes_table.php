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
        Schema::create('order_disputes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dispute_id',50);
            $table->string('transaction_id', 50);
            $table->string('status', 30)->nullable();
            $table->json('disputed_transactions')->nullable();
            $table->json('adjudications')->nullable();
            $table->json('refund_details')->nullable();
            $table->json('offer')->nullable();
            $table->json('messages')->nullable();
            $table->integer('order_id')->unsigned();
            $table->timestamps();

            $table->index("transaction_id");
            $table->index("dispute_id");
            $table->index("order_id");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('order_disputes');
    }
};
