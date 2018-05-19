<?php

namespace LzoMedia\GroupsExtractor\Facebook;


/**
 * Created by PhpStorm.
 * User: lzo
 * Date: 27/04/17
 * Time: 20:58
 */


use LzoMedia\GroupsExtractor\Classes\App;


class Facebook extends App
{

    public $token;

    public $type;

    public $url = 'https://graph.facebook.com/v1.0/';

    public $responseData = [];


    /**
     * @return mixed
     */
    public function getResponseData()
    {
        return $this->responseData;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $responseData
     */
    public function setResponseData($responseData)
    {
        $this->responseData = $responseData;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

}