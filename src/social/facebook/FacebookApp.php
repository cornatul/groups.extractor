<?php


namespace LzoMedia\GroupsExtractor\Social\Facebook;
use League\Flysystem\Exception;
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


    public $responseData;


    /**
     * FacebookApp constructor.
     * @param $token
     * @throws \Exception
     */
    function __construct($token)
    {

        if(!isset($token)){

            throw new \Exception('Please provide a facebook developer token');

        }

        $this->token = $token;
    }


    /**
     *
     * method getToken
     * @return string
     */
    public function getToken()
    {
        return '&access_token='.$this->token;
    }


    /**
     * @method setExtractorType
     * @param mixed $type
     * @return object Extractor
     * @throws \Exception
     */
    public function setExtractorType(Extractor $type)
    {

       if(!isset($type)){

           throw new  \Exception('Please provide an extractor type');

       }

       $type->setType($type);

       $type->setToken($this->getToken());

       $type->setUrl($this->url);

       return  $this->type = $type;

    }

    /**
     * @method getResponse
     * @return mixed
     */
    public function getResponse()
    {
       return $this->type->responseData;
    }

    /**
     * @method process
     * @return mixed
     */
    public function process()
    {
        return $this->type->process();

    }

}