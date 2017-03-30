<?php
/**
 * Created by PhpStorm.
 * User: lzo
 * Date: 30/03/17
 * Time: 10:58
 */

namespace LzoMedia\GroupsExtractor\Social\Facebook\Extractors;


abstract class Extractor
{

    protected $type;

    protected $token;

    protected $return;

    protected $url;

    /**
     *
     */
    public function process(){

    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }


    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
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
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }
}