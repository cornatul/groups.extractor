<?php


namespace LzoMedia\GroupsExtractor\Social\Facebook;
use LzoMedia\GroupsExtractor\Managers\ClientManager;


use LzoMedia\GroupsExtractor\Classes\Extractor;

/**
 * Created by PhpStorm.
 * User: lzo
 * Date: 30/03/17
 * Time: 08:22
 */
class FacebookApp extends ClientManager
{
    public $token;

    public $type;

    public $url = 'https://graph.facebook.com/v1.0/';



    function __construct($token)
    {
        $this->token = $token;
    }


    /**
     * @return mixed
     */
    public function getToken()
    {
        return '&access_token='.$this->token;
    }


    /**
     * @param mixed $type
     */
    public function setExtractorType(Extractor $type)
    {

       $type->setType($type);

       $type->setToken($this->getToken());

       $type->setUrl($this->url);

       return  $this->type = $type;

    }

    /**
     * @param \Extractor $type
     * @return mixed
     */
    public function process()
    {
        return $this->type->process();

    }

}