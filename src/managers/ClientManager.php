<?php

namespace LzoMedia\GroupsExtractor\Managers;


use LzoMedia\GroupsExtractor\Interfaces\SocialExtractorInterface;

/**
 * Created by PhpStorm.
 * User: lzo
 * Date: 30/03/17
 * Time: 10:16
 */
class ClientManager implements SocialExtractorInterface
{
    protected $clientType;

    /**
     * @param ClientManager $type
     * @return ClientManager
     */
    public function setSocialType(ClientManager $type)
    {
        return $this->clientType = $type;
    }

    public function getSocialType()
    {
        return $this->clientType;
    }

    /**
     * @return mixed
     */
    function process(){

        return $this->clientType->process();

    }
}