<?php

namespace LzoMedia\GroupsExtractor\Social\Facebook\Extractors;

use LzoMedia\GroupsExtractor\Social\Facebook\FacebookApp;

/**
 * Created by PhpStorm.
 * User: lzo
 * Date: 30/03/17
 * Time: 08:29
 */
class GroupExtractor extends Extractor
{

    protected $extractor;

    public $fields = [
        'name',
        'description'
    ];


    public $endpoint = '/me/groups';


    public function __construct()
    {
    }

    /**
     * @return array
     */
    public function getFields()
    {
        return '?fields='.implode(',',$this->fields);
    }


    /**
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }


    /***
     * @return string
     */
    public function process()
    {

        return $this->getToken();
    }
}