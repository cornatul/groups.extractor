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

    public $image;

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
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @method setImage
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
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
     * @method setName
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }


    /**
     *
     * @param mixed $feed
     * @return $this
     */
    public function setFeed($feed)
    {
        $this->feed = $feed;
        return $this;
    }


    /**
     * @method setMembers
     * @param mixed $members
     * @return $this
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
     * @method getFeed
     * @return mixed
     */
    public function getFeed()
    {
        return $this->feed;
    }


    /**
     * @method getMembers
     * @return mixed
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * @method getName
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }



}