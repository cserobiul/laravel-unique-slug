<?php

namespace Cserobiul\Slug;

use Illuminate\Support\ServiceProvider;

class SlugServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind('slug', function($app) {
            return new Cserobiul\Slug\Slug();
        });

        $this->mergeConfigFrom(
            __DIR__.'/config/unique_slug.php', 'unique_slug'
        );
        $this->publishes([
            __DIR__.'/config/unique_slug.php' => config_path('unique_slug.php'),
        ]);
    }

    public function register()
    {
        parent::register(); // TODO: Change the autogenerated stub
    }
}