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
            'debug' => false,
        ]);

        $base_url = config("apps.url")."/api/Apps/list/apps";
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
        
        // foreach($response->data->apps as $key => $app) {
        //     $this->info("App Name: ".$app->name);
        //     $this->info("App Slug: ".$app->slug);
        //     $this->info("App Code: ".$app->code);
        //     $this->info("App Description: ".$app->description);
        //     $this->info("App Version: ".$app->version);
        //     $this->info("App Author: ".$app->author);
        //     $this->info("App Email: ".$app->email);
        //     $this->info("App URL: ".$app->url);
        //     $this->info("App Icon: ".$app->icon);
        //     $this->info("App Status: ".$app->status);
        //     $this->info("App Type: ".$app->type);
        //     $this->info("App Category: ".$app->category);
        //     $this->info("App Tags: ".$app->tags);
        //     $this->info("App Price: ".$app->price);
        //     $this->info("App License: ".$app->license);
        //     $this->info("App Require: ".$app->require);
        //     $this->info("App Require PHP: ".$app->require_php);
        //     $this->info("App Require Laravel: ".$app->require_laravel);
        //     $this->info("App Require MySQL: ".$app->require_mysql);
        // }
      
    }
}