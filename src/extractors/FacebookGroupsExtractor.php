<?php

/**
 * Created by PhpStorm.
 * User: lzo
 * Date: 27/04/17
 * Time: 21:12
 */

namespace LzoMedia\GroupsExtractor;

use LzoMedia\GroupsExtractor\Classes\Type;

class FacebookGroupsExtractor extends Type
{

    public $groups = [];

    public $endpoint = '/me/groups';


    /**
     * @return mixed
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param mixed $groups
     */
    public function setGroups($groups)
    {
        $this->groups = $groups;
    }

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * @param string $endpoint
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

}