<?php

namespace LzoMedia\GroupsExtractor\Social\Facebook\Extractors;


use LzoMedia\GroupsExtractor\Classes\Extractor;
use LzoMedia\GroupsExtractor\Interfaces\GroupInterface;
use LzoMedia\GroupsExtractor\Interfaces\RemoteImageInterface;

use LzoMedia\GroupsExtractor\Objects\Group;
use Illuminate\Support\Facades\File;



/**
 * Created by PhpStorm.
 * User: lzo
 * Date: 30/03/17
 * Time: 08:29
 */
class GroupExtractor extends Extractor implements GroupInterface,RemoteImageInterface
{

    public $responseData = [];

    /**
     * @var
     */
    protected $extractor;


    protected $saveRemoteImages = false;

    /**
     * @var array
     */
    public $fields = [
        'name',
        'description',
        'cover',

    ];

    /**
     * @var string
     */
    public $endpoint = '/me/groups';


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


    /***
     * @method process
     * @class GroupExtractor
     * @throws \Exception
     * @return array
     */
    public function process()
    {

        $this->responseData = collect([]);

        $data =  file_get_contents($this->getUrl().$this->getEndpoint().$this->getFields().$this->getToken());

        if ( $data === false )
        {
            throw new \Exception('there was no data from facebook received');

        }else {


            $data = json_decode(($data), true);

            if(!array_key_exists('data',$data)){

                throw new \Exception('The response data from facebook is null');
            }


            foreach ($data['data'] as $post){


                if (isset($post)) {

                    $this->responseData->push($this->generateGroup($post));

                }

            }


            $exists = array_key_exists("next", @$data['paging']);


            while ($exists == true) {

                if (strlen(@$data['paging']['next']) == 0) {

                    break;

                } else {


                    $data = file_get_contents(@$data['paging']['next']);

                    $data = json_decode(($data), true);


                    foreach ($data['data'] as $post){

                        $this->responseData->push($this->generateGroup($post));


                    }

                }

            }


            return $this->responseData->all();
        }

    }



    /**
     * @method generateGroup
     * @param $groupJson
     * @return Group
     */
    function generateGroup($groupJson = '')
    {

        $group = new Group();

        $group->setGroupId(intval($groupJson['id']));

        $group->setName(@$groupJson['name']);

        $group->setDescription(@$groupJson['description']);

        $group->setImage((@$groupJson['cover']['source']));

        $group->setPrivacy(1);

        $group->setType('facebook');

        return $group;


    }

    /**
     * @method saveImage
     * @param $image_source
     * @return boolean
     * @internal param $image_source
     */
    public function saveImage($image_source)
    {

        //@todo improve this to have a config file to set the storing location

        $path = explode('?', $image_source);

        if(is_array($path)){

            $filename = basename($path[0]);

            if (!File::exists(public_path('storage/app/media/' . $filename))) {


                $saved = \Image::make($image_source)->save(public_path('storage/app/media/' . $filename));

                return $saved == true ? public_path('storage/app/media/' . $filename) : false;

            }


        }else{

            return false;

        }

    }
}