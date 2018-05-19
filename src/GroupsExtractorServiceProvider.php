<?php

namespace LzoMedia\GroupsExtractor;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Route;

use LzoMedia\GroupsExtractor\Managers\ClientManager;
use LzoMedia\GroupsExtractor\Social\Yahoo\YahooApp;
use LzoMedia\GroupsExtractor\Social\Yahoo\Extractors\YahooGroupExtractor;



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

        \Log::info('Package was loaded');

        Route::get('/yahoo/', function (){

            //client
            $client = new ClientManager();

            //start the Yahoo
            $socialType = new YahooApp();

            //Type of extractor
            $typeOfDataToExtract = new YahooGroupExtractor();

            //extractor type should be a interface up
            $socialType->setExtractorType($typeOfDataToExtract);

            // set socialType
            $client->setSocialType($socialType);

            $groups  = ($client->process());

            return $groups;


        });

    }

    /**
     *
     */
    public function register()
    {
        $this->app->bind('groups-extractor', function () {
            return $this->app->make('LzoMedia\GroupsExtractor');
        });
    }


}
