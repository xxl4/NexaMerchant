<?php

test('the onebuy v1', function () {
    $response = $this->get('/onebuy/8395243356390');
    $response->assertStatus(200);
});

test('the shop returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
