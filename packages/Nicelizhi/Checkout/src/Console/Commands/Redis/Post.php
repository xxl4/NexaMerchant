<?php
namespace Nicelizhi\Checkout\Console\Commands\Redis;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;


class Post extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'checkout:redis:set';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set Redis Data';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $cache_prefix_key = "checkout_v1_";

        $redis = Redis::connection('default');

        $comment_redis_key = $cache_prefix_key."product_comments";

        $comments = $redis->hgetall($comment_redis_key);

        $redis->hset($comment_redis_key, "key1", "v1_new");

        var_dump($comments);

    }
}
