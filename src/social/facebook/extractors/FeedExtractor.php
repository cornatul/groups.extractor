<?php

namespace LzoMedia\GroupsExtractor\Social\Facebook\Extractors;


use LzoMedia\GroupsExtractor\Classes\Extractor;
use LzoMedia\GroupsExtractor\Interfaces\MessageInterface;
use LzoMedia\GroupsExtractor\Objects\Post;

class FeedExtractor extends Extractor implements MessageInterface {

    /**
     * @var array
     */
    public $responseData = [];

    /**
     * @var int
     */
    protected $limitPages = 2;

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
        'full_picture',
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
     * @method setEndpoint
     * @param string $endpoint
     * @return string
     */
    public function setEndpoint($endpoint)
    {
        return $this->endpoint  =  $endpoint . $this->endpoint;
    }


    /**
     * @return array|\Illuminate\Support\Collection
     * @throws \Exception
     */
    function process()
    {
        $this->responseData = collect([]);

        $data =  file_get_contents($this->getUrl().
                                    $this->getEndpoint().
                                    $this->getFields().
                                    $this->getToken());

        if ( $data === false )
        {
            throw new \Exception('there was no data from facebook received');

        }else {

            $data = json_decode(($data), true);

            if(!array_key_exists('data',$data)){

                throw new \Exception('The response data from facebook is null');

            }



            foreach ($data['data'] as $post){


                $this->responseData->push($this->generatePost($post));

            }


            $exists = array_key_exists("next", @$data['paging']);


            while ($exists == true) {

                if(!isset($data['paging']['next'])){

                    break;

                }

                if (strlen($data['paging']['next']) == 0) {

                    break;

                } else {


                    $data = file_get_contents($data['paging']['next']);

                    $data = json_decode(($data), true);


                    foreach ($data['data'] as $post){

                        $this->responseData->push($this->generatePost($post));

                    }

                    if(($this->responseData->count()) == $this->limitPages){

                        return ($this->responseData->all());

                    }

                }


            }



            return ($this->responseData->all());

        }

    }


    /**
     * @method getLimitPages
     * @return int
     */
    public function getLimitPages()
    {
        return $this->limitPages;
    }


    /**
     * @method setLimitPages
     * @param int $limitPages
     */
    public function setLimitPages($limitPages)
    {
        $this->limitPages = $limitPages;

    }


    /**
     * @method generatePost
     * @param $data
     * @return Post
     */
    public function generatePost($data)
    {
        //<editor-fold desc="the body method">

        $post = new Post();

        $post->setGroupId(intval($this->getEndpoint()));

        $post->setType(@$data['type']);

        $post->setLink(@$data['link']);

        $post->setMessage(@$data['story'].@$data['description'].@$data['message']);

        $post->setImage(@$data['full_picture']);


        return $post;
        //</editor-fold>

    }

}