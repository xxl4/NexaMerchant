<?php
namespace Nicelizhi\Apps\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class Create extends Command 
{
    protected $signature = 'apps:create';

    protected $description = 'Create a new app';

    protected $AppName = null;

    protected $dirList = [
        'src',
        'src/Controllers',
        'src/Config',
        'src/Config/menu.php',
        'src/Config/acl.php',
        'src/Dtabase',
        'src/Dtabase/Migrations',
        'src/Dtabase/Seeds',
        'src/Resources',
        'src/Resources/views',
        'src/Resources/lang',
        'src/Http',
        'src/Http/Middleware',
        'src/Http/Requests',
        'src/Http/Controllers',
        'src/Http/Controllers/Api',
        'src/Http/Controllers/Api/Controller.php',
        'src/Http/Controllers/Web',
        'src/Http/Controllers/Web/Controller.php',
        'src/Http/Controllers/Admin',
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
        'tests',
        'docs',
        'REAME.md',
        'composer.json'
    ];

    public function handle()
    {
        //$name = $this->argument('name');
        $name = $this->ask('Please Input your Apps Name?');
        $this->info("Creating app: $name");
        $base_dir = config("apps.base_dir");
        $name = trim($name);

        $name = ucfirst($name);

        $dir = base_path().$base_dir.'/'.$name;

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

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
            //$this->info("App $name created successfully");
        } else {
            $this->error("App $name already exists");
            return false;
        }

        array_push($this->dirList, 'src/Providers/'.$name.'Provider.php');
        array_push($this->dirList, 'src/Config/'.$name.'.php');

        foreach($this->dirList as $d) {
            if (strpos($d, '.')) {
                $this->createFile($dir, $d, '');
            } else {
                mkdir($dir.'/'.$d, 0777, true);
            }

        }



        $this->info("App $name created successfully");
        
    }

    public function createFile($dir, $file, $content)
    {
        switch($file) {
            case 'composer.json':
                $content = file_get_contents(__DIR__.'/stubs/composer.json.stub');
            break;
            case 'REAME.md':
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
            case 'src/Http/Controllers/Api/Controller.php':
                $content = file_get_contents(__DIR__.'/stubs/Controller.api.php.stub');
            break;
            case 'src/Providers/'.$this->AppName.'Provider.php':
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
            default:
            break;
        }

        $content = str_replace('{{NAME}}', $this->AppName, $content);



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