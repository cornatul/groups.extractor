<?php

namespace LzoMedia\GroupsExtractor;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Route;

use LzoMedia\GroupsExtractor\Managers\ClientManager;

use LzoMedia\GroupsExtractor\Social\Facebook\Extractors\FeedExtractor;
use LzoMedia\GroupsExtractor\Social\Facebook\Extractors\GroupExtractor;
use LzoMedia\GroupsExtractor\Social\Facebook\FacebookApp;
use LzoMedia\GroupsExtractor\Social\Yahoo\YahooApp;
use LzoMedia\GroupsExtractor\Social\Yahoo\Extractors\GroupExtractor as YahooGroupExtractor;

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


        Route::get('/facebook/{token}', function ($token){

            //client
            $client = new ClientManager();

            //start the Yahoo
            $socialType = new FacebookApp($token);

            //Type of extractor
            $typeOfDataToExtract = new FeedExtractor();

            $typeOfDataToExtract->setEndpoint('368215273251493');

            //set the limit
            $typeOfDataToExtract->setLimitPages(2);

            //extractor type should be a interface up
            $socialType->setExtractorType($typeOfDataToExtract);

            // set socialType
            $client->setSocialType($socialType);

            //process
            $client->process();

            //gets the response
            $results = $client->getResponse();


            dd($results);


        });
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


}
