<?php

namespace LzoMedia\GroupsExtractor\Social\Yahoo\Extractors;

use LzoMedia\GroupsExtractor\Social\Yahoo\Extractors\Extractor;


/**
 * Created by PhpStorm.
 * User: lzo
 * Date: 30/03/17
 * Time: 08:29
 */
class GroupExtractor extends Extractor
{

    protected $extractor;
    //https://groups.yahoo.com/api/v1/search/groups&offset=10&maxHits=10&sortBy=LATEST_ACTIVITY&query=
    //https://groups.yahoo.com/api/v1/search/groups?offset=10&maxHits=10&sortBy=LATEST_ACTIVITY&query=

    //'offset=10sortBy=LATEST_ACTIVITY&intlCode=us&query='

    protected $endpoint = '/search/groups?';

    protected $offset = '&offset=150';

    protected $maxHits = '&maxHits=10';

    protected $sortBy = '&sortBy=LATEST_ACTIVITY&';

    protected $query = 'query=';

    protected $total;

    /**
     * @return string
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param string $query
     */
    public function setQuery($query)
    {
        $this->query = $this->query.$query;
    }


    /**
     * @return mixed
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * @param mixed $endpoint
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }


    /***
     * @return string
     */
    public function process()
    {

        $processor =  $this->getType();

        $url =  $processor->url . $this->getEndpoint().$this->offset.$this->maxHits.$this->sortBy.$this->query;

        $data = file_get_contents($url);

        $check =  json_decode($data);

        while(array_key_exists('ygData', $check)){

            return $check;

        }

    }

}