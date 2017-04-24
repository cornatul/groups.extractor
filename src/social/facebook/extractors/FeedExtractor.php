<?php

namespace LzoMedia\GroupsExtractor\Social\Facebook\Extractors;


use LzoMedia\GroupsExtractor\Classes\Extractor;

class FeedExtractor extends Extractor{


    /**
     * @var
     */
    protected $extractor;

    /**
     * @var array
     */
    public $fields = [
        'story',
        'message',
        'type',
        'picture',
        'link',
        'source',
        'description',
        'from'

    ];

    /**
     * @var string
     */
    public $endpoint = '/feed/';


    /**
     * GroupExtractor constructor.
     */
    public function __construct()
    {
    }

    /**
     * @method getFields
     * @return string
     */
    public function getFields()
    {
        return '?fields='.implode(',',$this->fields);
    }


    /**
     * @method getEndpoint
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
        return $this->endpoint  =  $endpoint . $this->endpoint;
    }


    function process()
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


            dd($response_data);

            if(count($response_data) == 100){
                dd($response_data);
            }

            return $response_data;

        }

    }


}