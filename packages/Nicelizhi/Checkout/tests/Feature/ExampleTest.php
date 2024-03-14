<?php
test('test checkout successful response', function() {
    $response = $this->get('/checkout/v1/cms/contact-us');

    $response->assertStatus(200);
});
