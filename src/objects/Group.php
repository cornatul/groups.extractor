<?php
namespace LzoMedia\GroupsExtractor\Objects;
/**
 * Created by PhpStorm.
 * User: lzo
 * Date: 12/04/17
 * Time: 21:52
 */
class Group
{

    public $name;

    public $description;

    public $cover;

    public $feed;

    public $members;

    public $group_id;


    /**
     * @return mixed
     */
    public function getGroupId()
    {
        return $this->group_id;
    }


    /**
     * @param mixed $group_id
     */
    public function setGroupId($group_id)
    {
        $this->group_id = $group_id;

        return $this;
    }

    /**
     * Group constructor.
     */
    public function __construct()
    {
        return $this;
    }


    /**
     * @return mixed
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * @param mixed $cover
     */
    public function setCover($cover)
    {
        $this->cover = $cover;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }


    /**
     * @param mixed $feed
     */
    public function setFeed($feed)
    {
        $this->feed = $feed;
        return $this;
    }


    /**
     * @param mixed $members
     */
    public function setMembers($members)
    {
        $this->members = $members;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getFeed()
    {
        return $this->feed;
    }


    /**
     * @return mixed
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }



}