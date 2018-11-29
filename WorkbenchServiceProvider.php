<?php

namespace ApolloPY\Workbench;

use Illuminate\Support\ServiceProvider;
use ApolloPY\Workbench\Console\WorkbenchMakeCommand;

class WorkbenchServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the package.
     */
    public function boot()
    {
        $path = config_path('workbench.php');

        $this->publishes([
            __DIR__.'/config.php' => $path,
        ], 'config');

        if (file_exists($path)) {
            $this->mergeConfigFrom($path, 'workbench');
        }
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton('package.creator', function ($app) {
            return new PackageCreator($app['files']);
        });

        $this->app->singleton('command.workbench', function ($app) {
            return new WorkbenchMakeCommand($app['package.creator']);
        });

        $this->commands('command.workbench');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('package.creator', 'command.workbench');
    }
}
