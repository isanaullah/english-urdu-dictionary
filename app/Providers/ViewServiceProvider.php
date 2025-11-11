<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    private static $legacyClassesLoaded = false;
    private static $rdbInstance = null;

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Share $path variable with all views
        View::composer('*', function ($view) {
            $view->with('path', url('/') . '/assets/');
            
            // Initialize legacy $rdb object only once
            if (!self::$legacyClassesLoaded) {
                $classesPath = resource_path('views/frontend/includes/classes');
                
                // Only load security.class.php if classes don't exist
                // It will auto-load its dependencies via include() statements
                if (!class_exists('security', false)) {
                    $securityFile = $classesPath . '/security.class.php';
                    if (file_exists($securityFile)) {
                        // Change to the classes directory so relative includes work
                        $oldDir = getcwd();
                        chdir($classesPath);
                        
                        try {
                            require_once $securityFile;
                        } catch (\Exception $e) {
                            // Ignore errors during include
                        }
                        
                        // Change back to original directory
                        chdir($oldDir);
                    }
                }
                
                // Create $rdb instance if security class exists
                if (class_exists('security', false)) {
                    try {
                        // Use Laravel's database configuration
                        $dbHost = config('database.connections.mysql.host', 'localhost');
                        $dbName = config('database.connections.mysql.database', 'base');
                        $dbUser = config('database.connections.mysql.username', 'root');
                        $dbPass = config('database.connections.mysql.password', '');
                        
                        self::$rdbInstance = new \security($dbHost, $dbName, $dbUser, $dbPass);
                    } catch (\Exception $e) {
                        self::$rdbInstance = null;
                    }
                }
                
                self::$legacyClassesLoaded = true;
            }
            
            $view->with('rdb', self::$rdbInstance);
        });
    }
}
