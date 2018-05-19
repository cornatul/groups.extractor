<?php
/**
 * Created by PhpStorm.
 * User: lzo
 * Date: 27/04/17
 * Time: 20:00
 */

namespace LzoMedia\GroupsExtractor\Classes;


class Type
{
    public $token;

    public $endpoint;

    public $type;


    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
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
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }


}