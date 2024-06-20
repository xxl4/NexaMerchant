<?php
namespace Nicelizhi\Apps\Console\Commands;

use Illuminate\Support\Facades\Storage;

class Remove extends CommandInterface
{
    protected $signature = 'apps:remove';

    protected $description = 'Remove a new app';

    protected $AppName = null;
    protected $AppNameLower = null;

    protected $dirList = [
        'src',
        'src/Config',
        'src/Config/menu.php',
        'src/Config/acl.php',
        'src/Dtabase',
        'src/Dtabase/Migrations',
        'src/Dtabase/Seeds',
        'src/Resources',
        'src/Resources/views',
        'src/Resources/views/demo.blade.php',
        'src/Resources/views/Admin',
        'src/Resources/views/Admin/demo.blade.php',
        'src/Resources/lang',
        'src/Http',
        'src/Http/Middleware',
        'src/Http/Requests',
        'src/Http/Controllers',
        'src/Http/Controllers/Api',
        'src/Http/Controllers/Api/Controller.php',
        'src/Http/Controllers/Api/ExampleController.php',
        'src/Http/Controllers/Web',
        'src/Http/Controllers/Web/Controller.php',
        'src/Http/Controllers/Web/ExampleController.php',
        'src/Http/Controllers/Admin',
        'src/Http/Controllers/Admin/Controller.php',
        'src/Http/Controllers/Admin/ExampleController.php',
        'src/Console/Commands',
        'src/Console/Commands/Install.php',
        'src/Console/Commands/UnInstall.php',
        'src/Console/Commands/Upload.php',
        'src/Console/Commands/Publish.php',
        'src/Providers',
        'src/Helpers',
        'src/Listeners',
        'src/Models',
        'src/Repositories',
        'src/Routes',
        'src/Routes/web.php',
        'src/Routes/api.php',
        'src/Routes/admin.php',
        'tests',
        'docs',
        'README.md',
        'composer.json'
    ];

    public function getAppVer() {
        return config("apps.ver");
    }

    public function getAppName() {
        return config("apps.name");
    } 

    public function handle()
    {

        $name = $this->ask('Please Input your Apps Name?');
        $this->info("Creating app: $name");
        
        $dir = $this->getBaseDir($name);

        $this->info("dir ". $dir);


        if (!$this->confirm('Do you wish to continue?')) {
            // ...
            $this->error("App $name cannelled");
            return false;
        }


        if(!$this->checkOnelineAppName($name)) {
            $this->error("App $name is not valid");
            return false;
        }

        $this->AppName = $this->ucfirstAppName($name); //source name
        $this->AppNameLower = strtolower($name);

        if (is_dir($dir)) {
            //mkdir($dir, 0777, true);
            //rmdir($dir); // delete the directory
            ////$this->deleteDirectory($dir);
            //$this->info("App $name created successfully");
        } else {
            $this->error("App $name don't exists");
            return false;
        }

        

        
        // add data to composer json
        $composer_josn = file_get_contents("composer.json");
        $composer_object = json_decode($composer_josn, true);
        //var_dump($composer_josn);
        unset($composer_object['autoload']['psr-4']["NexaMerchant\\".$this->AppName."\\"]); //delete the data
        //var_dump($composer_object['autoload']['psr-4']);
        //var_dump($composer_object['autoload']['psr-4']["NexaMerchant\\".$this->AppName."\\"]);
        //var_dump($composer_josn);exit;
        $composer_josn = json_encode($composer_object, JSON_PRETTY_PRINT);
       
        file_put_contents("composer.json", $composer_josn);
        
        // add data to config/app.php providers
        $app_file = file_get_contents("config/app.php");
        //var_dump($app_file);
        $app_file = str_replace("NexaMerchant\\".$this->AppName."\\Providers\\".$this->AppName."ServiceProvider::class,", "", $app_file);
        //var_dump("NexaMerchant\\".$this->AppName."\\Providers\\".$this->AppName."ServiceProvider::class, \n");
        //var_dump($app_file);exit;

    
        file_put_contents("config/app.php", $app_file);

        // composer dump autoload
        exec('composer dump-autoload');

        $this->info("App $name created successfully");
        
    }

    private function deleteDirectory($dir) {
        if (!file_exists($dir)) {
            return true;
        }
    
        if (!is_dir($dir)) {
            return unlink($dir);
        }
    
        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }
    
            if (!$this->deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
                return false;
            }
    
        }
    
        return rmdir($dir);
    }

    /** 
     * 
     * Check oneline app name
     * 
     * 
     * @return boolean
     * 
     * 
    */
    public function checkOnelineAppName($name)
    {
        return true;
    }
}