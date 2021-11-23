<?php

namespace Saeedsalem\Windmill\Commands;

use Illuminate\Console\Command;

class AuthCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'windmill:auth';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run this command to edit auth';

    protected $path = [
        'resources/views/auth/passwords',
        'resources/views/auth',
        'resources/views/layouts'
    ];

    protected $files = [
        'resources/views/auth/login.blade.php',
        'resources/views/auth/passwords/confirm.blade.php',
        'resources/views/auth/passwords/email.blade.php',
        'resources/views/auth/passwords/reset.blade.php',
        'resources/views/auth/register.blade.php',
        'resources/views/auth/verify.blade.php',
        'resources/views/home.blade.php',
        'resources/views/layouts/app.blade.php',
    ];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->cleanViews();
        $this->copyFiles();
    }

    public function cleanViews()
    {
        foreach($this->files as $file){
            if(file_exists($file)){
                unlink($file);
            }
        }
        
        foreach($this->path as $path){
            if(file_exists($path)){
                rmdir($path);
            }
        }
    }

    public function copyFiles()
    {
        $this->copy_directory(__DIR__.'/../resources/', resource_path());
        $this->copy_directory(__DIR__.'/../cp/base/', base_path());
        $this->copy_directory(__DIR__.'/../cp/route/', base_path('routes/'));
        $this->copy_directory(__DIR__.'/../Controllers/', app_path('Http/Controllers/'));
        $this->copy_directory(__DIR__.'/../cp/Policies/', app_path('Policies/'));
        $this->copy_directory(__DIR__.'/../cp/Requests/', app_path('Http/Requests/'));
        $this->copy_directory(__DIR__.'/../cp/Middleware/', app_path('Http/Middleware/'));
        $this->copy_directory(__DIR__.'/../cp/seeders/', database_path('seeders/'));
        $this->copy_directory(__DIR__.'/../cp/Http/', app_path('Http/'));
        $this->copy_directory(__DIR__.'/../cp/Providers/', app_path('Providers/'));
        $this->copy_directory(__DIR__.'/../cp/Models/', app_path('Models/'));
        $this->copy_directory(__DIR__.'/../cp/Exceptions/', app_path('Exceptions/'));
        $this->copy_directory(__DIR__.'/../cp/config/', base_path('config/'));
    }

    private function copy_directory($src,$dst) {
        $dir = opendir($src);
        @mkdir($dst);
        while(false !== ( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if ( is_dir($src . '/' . $file) ) {
                    $this->copy_directory($src . '/' . $file,$dst . '/' . $file);
                }
                else {
                    copy($src . '/' . $file,$dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }
}
