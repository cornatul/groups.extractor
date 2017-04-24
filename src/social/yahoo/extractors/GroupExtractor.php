<?php

namespace LzoMedia\GroupsExtractor\Social\Yahoo\Extractors;

use LzoMedia\GroupsExtractor\Interfaces\GroupInterface;
use LzoMedia\GroupsExtractor\Interfaces\RemoteImageInterface;
use LzoMedia\GroupsExtractor\Objects\Group;
use LzoMedia\GroupsExtractor\Classes\Extractor;

use Illuminate\Support\Facades\File;

/**
 * Created by PhpStorm.
 * User: lzo
 * Date: 30/03/17
 * Time: 08:29
 */
class GroupExtractor extends Extractor implements GroupInterface,RemoteImageInterface
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

    protected $saveRemoteImages = false;



    /**
     * @method getSortBy
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
     * method getQuery
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
       return    $this->query = $this->query.$query;
    }


    /**
     * @method getEndpoint
     * @return mixed
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }



    /**
     * @method getMaxHits
     * @return string
     */
    public function getMaxHits()
    {
        return $this->maxHits;
    }

    /**
     * @method getOffset
     * @return int
     */
    public function getOffset()
    {
        return $this->offsetString.$this->offset;
    }

    /**
     * @method setOffset
     * @param int $offset
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;
    }





    /***
     * @method process
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

                    $results[] = $this->generateGroup($group);

                }
            }


            if($i == 10){

                return ($results);

            }

        }while(array_key_exists('ygData', $check));

        return $results;


    }




    /**
     * @method getTotal
     * @param  $total
     * @return int
     */
    public function getTotal($total = 0)
    {
        return $this->total = $total;
    }

    /**
     * @method setTotal
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

        if($groupJson->restricted == 'RESTRICTED'){

            $group->setPrivacy(1);

        }else{

            $group->setPrivacy(0);

        }


        $group->setGroupId(@$groupJson->groupId);

        if($this->saveRemoteImages == true){

            $group->setImage($this->saveImage(@$groupJson->photoUrl));

        }else{

            $group->setImage('default-group.jpg');

        }

        $group->setType('yahoo');

        $group->setGroupId(@$groupJson->groupId);

        return $group;


    }


    /**
     * @param $image_source
     * @return mixed
     * @internal param $image_source
     */
    public function saveImage($image_source)
    {
        // TODO: Implement saveImage() method.
        $path = explode('?', $image_source);

        if(is_array($path)){

            $filename = basename($path[0]);

            if (!File::exists(public_path('storage/app/media/' . $filename))) {


                $saved = \Image::make($path[0])->save(public_path('storage/app/media/' . $filename));

                return $saved == true ? public_path('storage/app/media/' . $filename) : null;

            }


        }else{

            return null;

        }

    }
}