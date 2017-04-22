<?php

namespace LzoMedia\GroupsExtractor\Social\Yahoo\Extractors;

use LzoMedia\GroupsExtractor\Interfaces\GroupInterface;
use LzoMedia\GroupsExtractor\Objects\Group;
use LzoMedia\GroupsExtractor\Classes\Extractor;

/**
 * Created by PhpStorm.
 * User: lzo
 * Date: 30/03/17
 * Time: 08:29
 */
class GroupExtractor extends Extractor implements GroupInterface
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
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     */
    public function setLimit()
    {
        return $this->limit =+ 10;
    }

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
       return    $this->query = $this->query.$query;
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
        $this->offset = $offset;
    }


    /***
     * @return string
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

                        $results[] = $this->generateGroup($group);
                    }
                }
            }


            if($i == 100){

                return ($results);

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
     * @method generateNextUrl
     * return string
     * @param int $in
     */
    function generateNextUrl($in = 0){

        $this->setOffset($in);

        $url =  $this->getType()->url
            . $this->getEndpoint()
            . $this->getSortBy()
            . $this->setQuery('')
            . $this->getOffset()
            . $this->getMaxHits();

        return $url;
    }


    /**
     * @method generateGroup
     * @param $groupJson
     * @return Group
     */
    function generateGroup($groupJson = '')
    {


        $group = new Group();

        $group->setName(@$groupJson->name);

        $group->setDescription(@$groupJson->desc);

        if(@$groupJson->photoUrl != ''){

            $groupJson->photoUrl = str_replace('=tn', '=hr', $groupJson->photoUrl);

        }

        $group->setImage(@$groupJson->photoUrl);

        $group->setGroupId(@$groupJson->group_id);

        return $group;


    }


}