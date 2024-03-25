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

    public function __construct($prod_id)
    {
        $this->redis = Redis::connection('default');
        $this->prod_id = $prod_id;
    }

    public function collection(Collection $rows)
    {
        foreach($rows as $key=>$row) {
            var_dump($row);
            if($key==0) continue;
            $value = [];
            if(empty($row[0])) continue;
            $value['name'] = trim($row[0]);
            $value['title'] = trim($row[1]);
            $value['content'] = trim($row[2]);
            $this->redis->hSet($this->cache_key.$this->prod_id, $key, json_encode($value));
        }
    }
}