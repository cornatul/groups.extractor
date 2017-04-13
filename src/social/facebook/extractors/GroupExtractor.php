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
     * @method process
     * @class GroupExtractor
     * @return string
     */
    public function process()
    {

        $response_data = [];

        $data =  file_get_contents($this->getUrl().$this->getEndpoint().$this->getFields().$this->getToken());

        if ( $data === false )
        {
            throw new \Exception('there was no data from facebook received');

        }else {


            $data = json_decode(($data), true);

            if(!array_key_exists('data',$data)){

                throw new \Exception('The response data from facebook is null');
            }

            $exists = array_key_exists("next", @$data['paging']);

            $response_data = array_merge($response_data, $data['data']);

            while ($exists == true) {

                if (strlen(@$data['paging']['next']) == 0) {

                    break;

                } else {


                    $data = file_get_contents(@$data['paging']['next']);

                    $data = json_decode(($data), true);

                    $response_data = array_merge($response_data, $data["data"]);


                }

            }

            return $response_data;
        }

    }
}