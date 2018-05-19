<?php
namespace LzoMedia\GroupsExtractor\Objects;


class Post{


    public $group_id;


    public $type;


    public $link;


    public $message;


    public $image;

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }



    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }


    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }


    /**
     * @param mixed $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }



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
    }


    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }


    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }






}