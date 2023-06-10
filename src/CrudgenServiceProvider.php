<?php

namespace Aabecede\Crudgen;

use Illuminate\Support\ServiceProvider;
use Aabecede\Crudgen\Console\MakeApiCrud;
use Aabecede\Crudgen\Console\MakeCommentable;
use Aabecede\Crudgen\Console\MakeCrud;
use Aabecede\Crudgen\Console\MakeViews;
use Aabecede\Crudgen\Console\RemoveApiCrud;
use Aabecede\Crudgen\Console\RemoveCommentable;
use Aabecede\Crudgen\Console\RemoveCrud;

class CrudgenServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //publish config file
        $this->publishes([__DIR__.'/../config/crudgen.php' => config_path('crudgen.php')]);

        //default-theme
        $this->publishes([__DIR__.'/stubs/default-theme/' => resource_path('crudgen/views/default-theme/')]);

        //and default-layout
        $this->publishes([__DIR__.'/stubs/default-layout.stub' => resource_path('views/default.blade.php')]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/crudgen.php', 'crudgen');

        $this->commands(
            MakeCrud::class,
            MakeViews::class,
            RemoveCrud::class,
            MakeApiCrud::class,
            RemoveApiCrud::class,
            MakeCommentable::class,
            RemoveCommentable::class,
        );
    }
}
