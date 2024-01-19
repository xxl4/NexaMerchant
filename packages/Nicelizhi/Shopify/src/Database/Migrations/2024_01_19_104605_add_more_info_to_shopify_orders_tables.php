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
        Schema::table('shopify_orders', function (Blueprint $table) {
            //
            $table->string("admin_graphql_api_id");
            $table->string("app_id");
            $table->string("browser_ip")->nullable();
            $table->string("buyer_accepts_marketing");
            $table->string("cancel_reason")->nullable();
            $table->string("cancelled_at")->nullable();
            $table->string("cart_token")->nullable();
            $table->string("checkout_id")->nullable();
            $table->string("checkout_token")->nullable();
            $table->string("client_details")->nullable();
            $table->string("closed_at")->nullable();
            $table->string("company")->nullable();
            $table->string("confirmation_number")->nullable();
            $table->string("confirmed")->nullable();
            $table->string("contact_email")->nullable();
            $table->string("currency")->nullable();
            $table->string("current_subtotal_price")->nullable();
            $table->json("current_subtotal_price_set");
            $table->string("current_total_additional_fees_set")->nullable();
            $table->string("current_total_discounts")->nullable();

            $table->json("current_total_discounts_set");


            $table->string("current_total_duties_set")->nullable();
            $table->string("current_total_price")->nullable();
            $table->json("current_total_price_set");

            $table->string("current_total_tax")->nullable();
            $table->json("current_total_tax_set");

            $table->string("customer_locale")->nullable();
            $table->string("device_id")->nullable();
            $table->json("discount_codes");
            $table->string("email")->nullable();
            $table->string("estimated_taxes")->nullable();
            $table->string("financial_status");

            $table->string("fulfillment_status")->nullable();
            $table->string("landing_site")->nullable();
            $table->string("landing_site_ref")->nullable();
            $table->string("location_id")->nullable();
            $table->string("merchant_of_record_app_id")->nullable();
            $table->string("name")->nullable();
            $table->string("note")->nullable();
            $table->json("note_attributes");
            $table->string("number");
            $table->string("order_number");
            $table->string("order_status_url");

            $table->string("original_total_additional_fees_set")->nullable();
            $table->string("original_total_duties_set")->nullable();
            $table->string("payment_gateway_names")->nullable();
            $table->string("phone")->nullable();
            $table->string("po_number")->nullable();
            $table->string("presentment_currency")->nullable();
            $table->dateTimeTz("processed_at")->nullable();
            $table->string("reference")->nullable();
            $table->string("referring_site")->nullable();
            $table->string("source_identifier")->nullable();
            $table->string("source_name")->nullable();
            $table->string("source_url")->nullable();
            $table->string("subtotal_price")->nullable();
            $table->json("subtotal_price_set");
            $table->string("tags")->nullable();
            $table->string("tax_exempt")->nullable();
            $table->string("tax_lines")->nullable();
            $table->string("taxes_included")->nullable();
            $table->string("test")->nullable();
            $table->string("token")->nullable();
            $table->string("total_discounts")->nullable();
            $table->json("total_discounts_set");
            $table->string("total_line_items_price")->nullable();
            $table->json("total_line_items_price_set")->nullable();
            $table->string("total_outstanding")->nullable();
            $table->string("total_price")->nullable();
            $table->json("total_price_set")->nullable();
            $table->json("total_shipping_price_set")->nullable();
            $table->string("total_tax")->nullable();
            $table->json("total_tax_set")->nullable();
            $table->string("total_tip_received")->nullable();
            $table->string("total_weight")->nullable();
            $table->string("user_id")->nullable();
            $table->json("billing_address")->nullable();
            $table->json("customer")->nullable();
            $table->json("discount_applications")->nullable();
            $table->json("fulfillments")->nullable();
            $table->json("line_items")->nullable();
            $table->json("payment_terms")->nullable();
            $table->json("refunds")->nullable();
            $table->json("shipping_address")->nullable();
            $table->json("shipping_lines")->nullable();

        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shopify_orders', function (Blueprint $table) {
            //
            $table->dropColumn('admin_graphql_api_id');
            $table->dropColumn("app_id");
            $table->dropColumn("browser_ip");
            $table->dropColumn("buyer_accepts_marketing");
            $table->dropColumn("cancel_reason");
            $table->dropColumn("cart_token");
            $table->dropColumn("checkout_id");
            $table->dropColumn("checkout_token");
            $table->dropColumn("client_details");
            $table->dropColumn("closed_at");
            $table->dropColumn("company");
            $table->dropColumn("confirmation_number");
            $table->dropColumn("confirmed");
            $table->dropColumn("contact_email");
            $table->dropColumn("currency");
            $table->dropColumn("current_subtotal_price");
            $table->dropColumn("current_subtotal_price_set");
            $table->dropColumn("current_total_additional_fees_set");
            $table->dropColumn("current_total_discounts");

            $table->dropColumn("current_total_discounts_set");


            $table->dropColumn("current_total_duties_set");
            $table->dropColumn("current_total_price");
            $table->dropColumn("current_total_price_set");

            $table->dropColumn("current_total_tax");
            $table->dropColumn("current_total_tax_set");

            $table->dropColumn("customer_locale");
            $table->dropColumn("device_id");
            $table->dropColumn("discount_codes");
            $table->dropColumn("email");
            $table->dropColumn("estimated_taxes");
            $table->dropColumn("financial_status");

            $table->dropColumn("fulfillment_status");
            $table->dropColumn("landing_site");
            $table->dropColumn("landing_site_ref");
            $table->dropColumn("location_id");
            $table->dropColumn("merchant_of_record_app_id");
            $table->dropColumn("name");
            $table->dropColumn("note");
            $table->dropColumn("note_attributes");
            $table->dropColumn("number");
            $table->dropColumn("order_number");
            $table->dropColumn("order_status_url");

            $table->dropColumn("original_total_additional_fees_set");
            $table->dropColumn("original_total_duties_set");
            $table->dropColumn("payment_gateway_names");
            $table->dropColumn("phone");
            $table->dropColumn("po_number");
            $table->dropColumn("presentment_currency");
            $table->dropColumn("processed_at");
            $table->dropColumn("reference");
            $table->dropColumn("referring_site");
            $table->dropColumn("source_identifier");
            $table->dropColumn("source_name");
            $table->dropColumn("source_url");
            $table->dropColumn("subtotal_price");
            $table->dropColumn("subtotal_price_set");
            $table->dropColumn("tags");
            $table->dropColumn("tax_exempt");
            $table->dropColumn("tax_lines");
            $table->dropColumn("taxes_included");
            $table->dropColumn("test");
            $table->dropColumn("token");
            $table->dropColumn("total_discounts");
            $table->dropColumn("total_discounts_set");
            $table->dropColumn("total_line_items_price");
            $table->dropColumn("total_line_items_price_set");
            $table->dropColumn("total_outstanding");
            $table->dropColumn("total_price");
            $table->dropColumn("total_price_set");
            $table->dropColumn("total_shipping_price_set");
            $table->dropColumn("total_tax");
            $table->dropColumn("total_tax_set");
            $table->dropColumn("total_tip_received");
            $table->dropColumn("total_weight");
            $table->dropColumn("user_id");
            $table->dropColumn("billing_address");
            $table->dropColumn("customer");
            $table->dropColumn("discount_applications");
            $table->dropColumn("fulfillments");
            $table->dropColumn("line_items");
            $table->dropColumn("payment_terms");
            $table->dropColumn("refunds");
            $table->dropColumn("shipping_address");
            $table->dropColumn("shipping_lines");
        });
    }
};
