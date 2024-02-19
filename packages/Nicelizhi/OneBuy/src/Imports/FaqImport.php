<?php
namespace Nicelizhi\OneBuy\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use phpDocumentor\Reflection\Utils;


class FaqImport implements ToCollection
{
    private $redis = null;
    private $cache_key = "faq";

    public function __construct()
    {
        $this->redis = Redis::connection('default');
    }

    public function collection(Collection $rows)
    {
        foreach($rows as $key=>$row) {
            if($key==0) continue;
            $value = [];
            $value['q'] = trim($row[1]);
            $value['a'] = trim($row[2]);
            $this->redis->hSet($this->cache_key, $key, json_encode($value));
        }
    }
}