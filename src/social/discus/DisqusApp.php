<?php

/**
 * Created by PhpStorm.
 * User: lzo
 * Date: 19/04/17
 * Time: 08:12
 */

namespace LzoMedia\GroupsExtractor\Social\Discus;




class DiscussApp
{

    protected $type;

    protected $url = 'https://disqus.com/api/3.0/';

    public function __construct()
    {
        
    }

    /**
     * @param Extractor $type
     * @return Extractor
     */
    public function setExtractorType(Extractor $type)
    {

        $type->setType($type);

        $type->setUrl($this->url);

        return  $this->type = $type;

    }


    /**
     * @method process
     *
     * @return mixed
     */
    public function process()
    {
        return $this->type->process();
    }
    
}