<?php
/**
 * Created by PhpStorm.
 * User: lzo
 * Date: 30/03/17
 * Time: 09:53
 */
namespace LzoMedia\GroupsExtractor\Social\Yahoo;

use LzoMedia\GroupsExtractor\Managers\ClientManager;
use LzoMedia\GroupsExtractor\Social\Yahoo\Extractors\Extractor;


/**
 * Class YahooApp
 * @package LzoMedia\GroupsExtractor\Social\Yahoo
 */
class YahooApp extends ClientManager
{

    protected $type;

    protected $url = 'https://groups.yahoo.com/api/v1/';

    /**
     * @param Extractor $type
     * @return Extractor
     */
    public function setExtractorType(Extractor $type)
    {

        $type->setType($type);

        $type->setUrl($this->url);

        return  $this->type = $type;

    }


    /**
     * @method process
     *
     * @return mixed
     */
    public function process()
    {
        return $this->type->process();
    }
}