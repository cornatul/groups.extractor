<?php
/**
 * Created by PhpStorm.
 * User: lzo
 * Date: 30/03/17
 * Time: 09:59
 */

namespace LzoMedia\GroupsExtractor\Interfaces;


interface GroupInterface
{

    /**
     * @method generateGroup
     * @param $group
     * @return mixed
     * @internal param $type
     */
    public function generateGroup($group);


}