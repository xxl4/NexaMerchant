<?php
use Webkul\Product\Models\Product;

it('can view the onebuy page', function() {
    $response = $this->get('/onebuy/8395243356390');
    $response->assertStatus(200);
});



it('can create a paypal order', function () {

    $slugOrPath = "8395243356390";
    $productRepository = new Product();
    $product = $productRepository->where('sku', $slugOrPath)->first();

    //if(is_null($product)) 

    $sku = $product->where("parent_id", $product->id)->first();

    //var_dump($sku);

    $productViewHelper = new \Webkul\Product\Helpers\ConfigurableOption();
    $attributes = $productViewHelper->getConfigurationConfig($product);

    //var_dump($attributes['index'][$sku->id]);

    $skus = $attributes['index'][$sku->id];

    $price = $attributes['variant_prices'][$sku->id]['final']['price'];
    $total = 2;
    $shippment_price = "9.99";

    $data = [
        'first_name' => '',
        'second_name' => '',
        'email' => '',
        'phone_full' => '',
        'country' => 'US',
        'city' => '',
        'province' => '',
        'address' => '',
        'code' => '',
        'product_delivery' => $shippment_price,
        'currency' => 'USD',
        'product_price' => $price * $total,
        'total' => $price * $total + $shippment_price,
        'total' => $total,
        'payment_return_url' => '/checkout/v1/success/',
        'payment_cancel_url' => '/onebuy/'.$slugOrPath,
        'phone_prefix' => '',
        'payment_method' => 'paypal',
        'products' => [
            [
                'product_id' => $product->id,
                'description' => 'Variant 4 1443',
                'price' => $price,
                'amount' => $total,
                'img' => "",
                'product_sku' => $sku->sku,
                'variant_id' => $sku->id,
                'attribute_name' => 'US 5,Black',
                'attr_id' => '24_'.$skus[24].',23_'.$skus[23],
            ],
        ],
        'logo_image' => '',
        'brand' => '',
        'description' => "2x products with 2x shipping",
        'shopify_store_name' => "",
        'produt_amount_base' => "1",
        'domain_name' => config("app.url"),
        'price_template' => "",
        'omnisend' => "",
        'payment_account' => "paypal",
        'shipping_address' => "",
        'bill_first_name' => "",
        'bill_second_name' => "",
        'bill_country' => "",
        'bill_city' => "",
        'bill_province' => "",
        'bill_address' => "",
        'bill_code' => "",
        'error' => false,
    ];

    // 201 http created
    $response = $this->post('/onebuy/order/addr/after',$data);
    var_dump($response);
    $response->assertStatus(200);

});

// it('can create a airwallex order', function () {

// });
