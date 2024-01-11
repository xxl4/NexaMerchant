<?php

test('the checkout successful response', function () {
    $response = $this->get('/checkout/v1/8398348714214');

    $response->assertStatus(404);
});

test('test checkout successful response', function() {
    $response = $this->get('/checkout/v1/cms/contact-us');

    $response->assertStatus(200);
});