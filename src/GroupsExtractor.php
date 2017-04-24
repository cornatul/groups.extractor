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
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }


    public function process(){

    }

}
