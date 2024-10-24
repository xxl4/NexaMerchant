<?php
it('fet comment api', function () {


    $response = $this->get('/api/reviews?product_id=8395243356390&per_page=6');
    $response->assertStatus(200);

});