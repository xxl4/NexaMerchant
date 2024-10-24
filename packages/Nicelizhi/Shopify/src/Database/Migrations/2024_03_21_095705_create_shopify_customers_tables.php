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
        Schema::create('shopify_customers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("cus_id");
            $table->string("email");
            $table->string("first_name");
            $table->string("last_name");
            $table->string("orders_count");
            $table->string("state");
            $table->string("total_spent");
            $table->string("last_order_id");
            $table->string("note")->nullable();
            $table->string("verified_email");
            $table->string("multipass_identifier")->nullable();
            $table->string("tax_exempt");
            $table->string("tags");
            $table->string("last_order_name");
            $table->string("currency");
            $table->string("phone");
            $table->text("addresses");
            $table->string("accepts_marketing");
            $table->string("accepts_marketing_updated_at");
            $table->string("marketing_opt_in_level");
            $table->string("tax_exemptions");
            $table->string("email_marketing_consent");
            $table->string("sms_marketing_consent");
            $table->string("admin_graphql_api_id");
            $table->text("default_address");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopify_customers');
    }
};
