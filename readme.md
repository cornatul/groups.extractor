#PHP Groups

Our system provides an simple way to extract facebook groups and yahoo groups using developer key for facebook and no key for yahoo

[code]

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
    
[/code]