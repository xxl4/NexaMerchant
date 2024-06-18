<?php
namespace Nicelizhi\Apps\Console\Commands;

use GuzzleHttp\Client;

class Search extends CommandInterface 
{
    protected $signature = 'apps:search {name}';

    protected $description = 'list an app';

    public function getAppVer() {
        return config("apps.ver");
    }

    public function getAppName() {
        return config("apps.name");
    }

    public function handle()
    {
        $name = $this->argument('name');
        if(empty($name)) {
            $this->error("App name is required!");
            return false;
        }

        $client = new Client([
            'timeout'  => 20.0,
            'debug' => false,
        ]);

        $base_url = config("apps.url")."/api/Apps/list/search/".$name;
        $this->info("Base URL: ".$base_url);

        $response = $client->get($base_url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'X-Access-Token' => "Bearer ".config("apps.token"),
            ]
        ]);

        $this->info("Response: ".$response->getStatusCode());
    
        $response = json_decode($response->getBody()->getContents(),true);

        $this->table(
            ['ID','App Name', 'App Slug','App Code','App Description','App Version','App Author','App Email','App URL','App Icon','App Status','App Type','App Category','App Tags','App Price','App License','App Require','App Require PHP','App Require Laravel','App Require MySQL'],
            $response['data']['apps']
        );


        
    }
}