<?php
namespace Nicelizhi\Apps\Console\Commands;

use Illuminate\Support\Facades\Storage;

class Create extends CommandInterface
{
    protected $signature = 'apps:create';

    protected $description = 'Create a new app';

    protected $AppName = null;
    protected $AppNameLower = null;

    protected $dirList = [
        'src',
        'src/Config',
        'src/Config/menu.php',
        'src/Config/acl.php',
        'src/Database',
        'src/Database/Migrations',
        'src/Database/Seeds',
        'src/Resources',
        'src/Resources/views',
        'src/Resources/views/demo.blade.php',
        'src/Resources/views/Admin',
        'src/Resources/views/Admin/demo.blade.php',
        'src/Resources/lang',
        'src/Resources/lang/en',
        'src/Resources/lang/en/app.php',
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
        'tests/bootstrap.php',
        'docs',
        'composer.json',
        'README.md',
        'phpunit.xml',
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


        if (!$this->confirm('Do you wish to continue?')) {
            // ...
            $this->error("App $name cannelled");
            return false;
        }

        if(!$this->checkOnelineAppName($name)) {
            $this->error("App $name is not valid");
            return false;
        }

        $this->AppName = $name;
        $this->AppNameLower = strtolower($name);

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
            //$this->info("App $name created successfully");
        } else {
            $this->error("App $name already exists");
            if (!$this->confirm('Do you wish to continue?')) {
                // ...
                $this->error("App $name cannelled");
                return false;
            }
        }

        array_push($this->dirList, 'src/Providers/'.$name.'ServiceProvider.php');
        array_push($this->dirList, 'src/Config/'.$name.'.php');

        foreach($this->dirList as $d) {
            if (strpos($d, '.')) {
                $this->createFile($dir, $d, '');
            } else {
                mkdir($dir.'/'.$d, 0777, true);
            }

        }

        
        // add data to composer json
        $composer_josn = file_get_contents("composer.json");
        $composer_object = json_decode($composer_josn, true);
        $composer_object['autoload']['psr-4']["NexaMerchant\\$this->AppName\\"] = "packages/Apps/".$this->AppName."/src";
        $composer_josn = json_encode($composer_object, JSON_PRETTY_PRINT);
        file_put_contents("composer.json", $composer_josn);
        
        // add data to config/app.php providers
        $app_file = file_get_contents("config/app.php");
        $app_file = str_replace("//APPS", "NexaMerchant\\".$this->AppName."\\Providers\\".$this->AppName."ServiceProvider::class, \n\t\t//APPS\n", $app_file);
        file_put_contents("config/app.php", $app_file);

        // composer dump autoload
        exec('composer dump-autoload');


        $this->info("App $name created successfully");
        
    }

    public function createFile($dir, $file, $content)
    {
        switch($file) {
            case 'composer.json':
                $content = file_get_contents(__DIR__.'/stubs/composer.json.stub');
            break;
            case 'README.md':
                $content = file_get_contents(__DIR__.'/stubs/README.md.stub');
            break;
            case 'src/Console/Commands/Install.php':
                $content = file_get_contents(__DIR__.'/stubs/Install.php.stub');
            break;
            case 'src/Console/Commands/UnInstall.php':
                $content = file_get_contents(__DIR__.'/stubs/UnInstall.php.stub');
            break;
            case 'src/Console/Commands/Upload.php':
                $content = file_get_contents(__DIR__.'/stubs/Upload.php.stub');
            break;
            case 'src/Console/Commands/Publish.php':
                $content = file_get_contents(__DIR__.'/stubs/Publish.php.stub');
            break;
            case 'src/Http/Controllers/Web/Controller.php':
                $content = file_get_contents(__DIR__.'/stubs/Controller.php.stub');
            break;
            case 'src/Http/Controllers/Admin/Controller.php':
                $content = file_get_contents(__DIR__.'/stubs/Controller.php.admin.stub');
            break;
            case 'src/Http/Controllers/Api/Controller.php':
                $content = file_get_contents(__DIR__.'/stubs/Controller.api.php.stub');
            break;
            case 'src/Providers/'.$this->AppName.'ServiceProvider.php':
                $content = file_get_contents(__DIR__.'/stubs/Provider.php.stub');
            break;
            case 'src/Config/'.$this->AppName.'.php':
                $content = file_get_contents(__DIR__.'/stubs/config.php.stub');
            break;
            case 'src/Config/menu.php':
                $content = file_get_contents(__DIR__.'/stubs/config.menu.php.stub');
            break;
            case 'src/Config/acl.php':
                $content = file_get_contents(__DIR__.'/stubs/config.acl.php.stub');
            break;
            case 'src/Routes/web.php':
                $content = file_get_contents(__DIR__.'/stubs/routes.web.php.stub');
            break;
            case 'src/Routes/api.php':
                $content = file_get_contents(__DIR__.'/stubs/routes.api.php.stub');
            break;
            case 'src/Routes/admin.php':
                $content = file_get_contents(__DIR__.'/stubs/routes.admin.php.stub');
            break;
            case 'src/Http/Controllers/Api/ExampleController.php':
                $content = file_get_contents(__DIR__.'/stubs/ExampleController.php.api.stub');
            break;
            case 'src/Http/Controllers/Web/ExampleController.php':
                $content = file_get_contents(__DIR__.'/stubs/ExampleController.php.web.stub');
            break;
            case 'src/Http/Controllers/Admin/ExampleController.php':
                $content = file_get_contents(__DIR__.'/stubs/ExampleController.php.admin.stub');
            break;

            case 'src/Resources/views/demo.blade.php':
                $content = file_get_contents(__DIR__.'/stubs/demo.blade.php.stub');
            break;
            case 'src/Resources/views/Admin/demo.blade.php':
                $content = file_get_contents(__DIR__.'/stubs/demo.blade.php.stub');
            break;
            case 'phpunit.xml':
                $content = file_get_contents(__DIR__.'/stubs/phpunit.xml.stub');
            break;
            case 'tests/bootstrap.php':
                $content = file_get_contents(__DIR__.'/stubs/bootstrap.php.stub');
            break;
            case 'src/Resources/lang/en/app.php':
                $content = file_get_contents(__DIR__.'/stubs/app.lang.php.stub');
            break;

            default:
            break;
        }

        $content = str_replace('{{NAME}}', $this->AppName, $content);
        $content = str_replace('{{name}}', $this->AppNameLower, $content);
        $content = str_replace('{{DATE}}', date("Y-m-d H:i:s"), $content);



        $file = $dir.'/'.$file;
        if (!file_exists($file)) {
            file_put_contents($file, $content);
        }
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