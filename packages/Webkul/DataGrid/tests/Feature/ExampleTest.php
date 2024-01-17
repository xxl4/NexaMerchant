<?php

test('the datagrid returns a successful response', function () {
    $response = $this->get('/');

<<<<<<< HEAD
    $response->assertStatus(404);
=======
    $response->assertStatus(200);
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
});
