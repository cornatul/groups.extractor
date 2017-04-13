<?php

namespace LzoMedia\GroupsExtractor;

use Illuminate\Support\ServiceProvider;


class GroupsExtractorServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    public function boot()
    {

        $this->registerAssets();
    }

    /**
     *
     */

    public function register()
    {
        $this->app->bind('groupsextractor', function () {
            return $this->app->make('LzoMedia\GroupsExtractor\GroupExtractor');
        });
    }


    /**
     *
     */
    public function registerAssets()
    {

    }
}
