<?php
/**
 * Created by PhpStorm.
 * User: lzo
 * Date: 30/03/17
 * Time: 08:29
 * @package Extractors
 */

namespace LzoMedia\GroupsExtractor\Social\Yahoo\Extractors;


/**
 * Class MessagesExtractor
 * @package LzoMedia\GroupsExtractor\Social\Yahoo\Extractors
 */
class MessagesExtractor extends Extractor
{

    protected $extractor;

    protected $endpoint = '/search/groups?';

    protected $offsetString = '&offset=';

    protected $offset = 10;

    protected $total = 0;

    protected $maxHits = '&maxHits=10';

    protected $sortBy = '&sortBy=LATEST_ACTIVITY';

    protected $query = '&query=';

    protected $limit = 10;

    /**
     * @param $limit
     * @return string
     */
    public function getSortBy($limit = 0)
    {
        if(($limit == 0))

            $limit  = $this->getLimit();

        else

            $limit  = $this->setLimit();

        return $this->sortBy.$limit;
    }


    /**
     * @class MessagesExtractor
     * @method getLimit
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @method setLimit
     * @param int $limit
     */
    public function setLimit()
    {
        return $this->limit =+ 10;
    }

    /**
     * @method getQuery
     *
     * @return string
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @method setQuery
     * @param string $query
     */
    public function setQuery($query)
    {
       return $this->query = $this->query.$query;
    }


    /**
     * @return mixed
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }



    /**
     * @return string
     */
    public function getMaxHits()
    {
        return $this->maxHits;
    }

    /**
     * @return int
     */
    public function getOffset()
    {
        return $this->offsetString.$this->offset;
    }

    /**
     * @param int $offset
     */
    public function setOffset($offset)
    {
        if(!is_int($offset))

            throw new \Exception('Please provide a integer');

        $this->offset = $offset;
    }


    /***
     * @method process
     * @description Mesages Extractor for yahoo groups
     * @return array
     */
    public function process()
    {


        $results = [];

        $i = 9;

        do{

            $i++;

            $url = null;

            if($i % $this->limit == 0){

                $url = $this->generateNextUrl($i);

            }

            if(isset($url)){

                $data = file_get_contents($url);

                $check = json_decode($data);

                foreach ($check->ygData->groups as $group){

                    if($group->restricted == 'OPEN'){

                        $results[] = $group;
                    }
                }
            }

        }while(array_key_exists('ygData', $check));

        return $results;


    }




    /**
     * @param  $total
     * @return int
     */
    public function getTotal($total = 0)
    {
        return $this->total = $total;
    }

    /**
     * @param int $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @param $in
     */
    function generateNextUrl($in){


        $this->setOffset($in);

        $url =  $this->getType()->url
            . $this->getEndpoint()
            . $this->getSortBy()
            . $this->setQuery('')
            . $this->getOffset()
            . $this->getMaxHits();

        return $url;
    }




}