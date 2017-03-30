<?php
/**
 * Created by PhpStorm.
 * User: lzo
 * Date: 28/03/17
 * Time: 11:54
 */

namespace LzoMedia\GroupsExtractor\Clients;


use LzoMedia\GroupsExtractor\Interfaces\RequestInterface;

class Curl implements RequestInterface
{



    protected $curl;


    function __construct()
    {
        $this->setCurl();
    }



    /**
     * @param mixed $curl
     */
    public function setCurl()
    {
        $this->curl = curl_init();
    }


    /**
     *
     */
    public function process()
    {
        // TODO: Implement process() method.
    }
}