<?php
/**
 * Created by PhpStorm.
 * User: lzo
 * Date: 22/04/17
 * Time: 14:04
 */

namespace LzoMedia\GroupsExtractor\Classes;


abstract class Extractor
{

    //type
    protected $type;

    //token
    protected $token;

    //return
    protected $return;

    //url
    protected $url;

    /**
     * @method process
     *
     * @description Processes
     *
     */
    public function process(){}

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }


    /**
     * @method setUrl
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @method setType
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }



    /**
     * @method getToken
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @method getType
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