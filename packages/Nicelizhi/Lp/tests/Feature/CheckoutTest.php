<?php
use Nicelizhi\Lp\Models\Lp;
it('can check all the checkout page', function () {
    $items = Lp::where("status", 1)->orderBy("id", "desc")->limit(10)->get();
    foreach ($items as $item) {
        echo $item->goto_url."\r\n";
        if(isset($item->goto_url)) continue;
        if(empty($item->goto_url)) continue;
        
        $response = $this->get($item->goto_url);
        var_dump($response->status());
        //var_dump($response);
        //$response->assertStatus(200);
        sleep(1);
    }
});