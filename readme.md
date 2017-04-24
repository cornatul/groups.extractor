#PHP Groups

Our system provides an simple way to extract facebook groups and yahoo groups using developer key for facebook and no key for yahoo


    //init the client
    $client = new ClientManager();

    //start the Yahoo
    $socialType = new \LzoMedia\GroupsExtractor\Social\Yahoo\YahooApp();

    //set the type of extractor
    $typeOfDataToExtract = new YahooGroupExtractor();

    //extractor type should be a interface up
    $socialType->setExtractorType($typeOfDataToExtract);

    // set socialType
    $client->setSocialType($socialType);

    $groups  = ($client->process());
    
    // return groups
    return $groups;
    

Todo
1. Implement url for groups
2. Add new providers
3. Improve speed