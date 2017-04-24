<?php

namespace LzoMedia\GroupsExtractor;


class GroupsExtractor
{

    protected $type;


    function __construct($type)
    {
        $this->type = $type;
    }


    /**
     * @method getType
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }


    //@todo this can be an entry point for entire app

    /**
     * @method process
     */
    public function process(){


    }

}
