<?php
/**
 * Created by PhpStorm.
 * User: lzo
 * Date: 22/04/17
 * Time: 14:53
 */


namespace LzoMedia\GroupsExtractor\Interfaces;

/**
 * Interface RemoteImageInterface
 * @package LzoMedia\GroupsExtractor\Interfaces
 */
interface RemoteImageInterface
{

    /**
     * @param $image_source
     * @return mixed
     * @internal param $image_source
     */
    public function saveImage($image_source);

}