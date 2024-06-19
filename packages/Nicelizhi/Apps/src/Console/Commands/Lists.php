<?php
namespace Nicelizhi\Apps\Console\Commands;

use GuzzleHttp\Client;

class Lists extends CommandInterface 
{
    protected $signature = 'apps:lists';

    protected $description = 'list an app';

    public function getAppVer() {
        return config("apps.ver");
    }

    public function getAppName() {
        return config("apps.name");
    }

    public function handle()
    {
        
        $this->info("List apps");

        $client = new Client([
            'timeout'  => 20.0,
            'debug' => true,
        ]);

        $base_url = config("app.url")."/api/Apps/list/apps";
        $this->info("Base URL: ".$base_url);

        $response = $client->get($base_url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'X-Access-Token' => "Bearer ",
            ]
        ],['debug' => true]);

        $this->info("Response: ".$response->getStatusCode());

        var_dump($response->getBody()->getContents());


        
    }
}