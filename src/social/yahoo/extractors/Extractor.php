<?php
/**
 * Created by PhpStorm.
 * User: lzo
 * Date: 30/03/17
 * Time: 10:58
 */

namespace LzoMedia\GroupsExtractor\Social\Yahoo\Extractors;

/**
 * Class Extractor
 * @package LzoMedia\GroupsExtractor\Social\Yahoo\Extractors
 */
abstract class Extractor
{

    protected $type;

    protected $url;

    /**
     * @method process
     * @return array
     */
    public function process(){


    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
       return $this->url = $url;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * method getUrl
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}