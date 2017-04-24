<?php
/**
 * Created by PhpStorm.
 * User: lzo
 * Date: 24/04/17
 * Time: 22:19
 */

namespace LzoMedia\GroupsExtractor\Objects;


class Member
{

    public $group_id;

    public $name;

    public $email;

    public $picture;


    /**
     * @return mixed
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param mixed $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }


    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }


    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
    public function getGroupId()
    {
        return $this->group_id;
    }

}