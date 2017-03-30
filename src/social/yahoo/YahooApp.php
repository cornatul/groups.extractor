<?php

namespace LzoMedia\GroupsExtractor\Social\Yahoo;

use LzoMedia\GroupsExtractor\Managers\ClientManager;
use LzoMedia\GroupsExtractor\Social\Yahoo\Extractors\Extractor;

/**
 * Created by PhpStorm.
 * User: lzo
 * Date: 30/03/17
 * Time: 09:53
 */
class YahooApp extends ClientManager
{

    protected $type;

    protected $url = 'https://groups.yahoo.com/api/v1/';


    public function setExtractorType(Extractor $type)
    {

        $type->setType($type);

        $type->setUrl($this->url);

        return  $this->type = $type;

    }

    public function process()
    {

        return $this->type->process();
    }
}