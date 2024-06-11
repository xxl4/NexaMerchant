<?php
test('test checkout successful response', function() {
    $response = $this->get('/checkout/v1/cms/contact-us');

    $response->assertStatus(200);
});

test('test checkout v2', function() {
    $response = $this->get('/checkout/v2/cms/contact-us');

    $response->assertStatus(200);
});

test('test checkout v3', function() {
    $response = $this->get('/checkout/v3/8395243356390');

    $response->assertStatus(200);
});
