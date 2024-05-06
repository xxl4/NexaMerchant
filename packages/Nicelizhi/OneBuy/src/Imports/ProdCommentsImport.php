<?php
namespace Nicelizhi\OneBuy\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use phpDocumentor\Reflection\Utils;


class ProdCommentsImport implements ToCollection
{
    private $redis = null;
    private $cache_key = "checkout_v1_product_comments_";
    private $prod_id = 0;

    public function __construct($prod_id, $force=0)
    {
        $this->redis = Redis::connection('default');
        $this->prod_id = $prod_id;
        $this->force = $force;
    }

    public function collection(Collection $rows)
    {
        if($this->force==1) {
            $this->redis->del($this->cache_key.$this->prod_id);
        }

        foreach($rows as $key=>$row) {
            //var_dump($row);
            if($key==0) continue;
            $value = [];
            if(empty($row[0])) continue;
            $value['name'] = trim($row[0]);
            $value['title'] = trim($row[1]);
            $value['content'] = trim($row[2]);
            $this->redis->hSet($this->cache_key.$this->prod_id, $key, json_encode($value));

            //insert into the product review
            // $product_review = \Webkul\Product\Models\ProductReview::where("product_id", $this->prod_id)->where("title", $value['title'])->where("name", $value['name'])->first();
            // if(is_null($product_review)) $product_review = Webkul\Product\Models\ProductReview();
            // $data = [];
            // $data['title'] = trim($row[1]);
            // $data['comment'] = trim($row[2]);
            // $data['rating'] = 5;
            // $data['name'] = trim($row[0]);

            // $product_review->title = $value['title'];
            // $product_review->name = $value['name'];
            // $product_review->comment = $value['content'];
            // $product_review->rating = 1;
            // $product_review->product_id = $this->prod_id;
            
            // $product_review->save();

            
            
            //$review = $this->productReviewRepository->create($data);
        }
    }
}