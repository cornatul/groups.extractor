<?php
/**
 * Created by PhpStorm.
 * User: lzo
 * Date: 30/03/17
 * Time: 09:59
 */

namespace LzoMedia\GroupsExtractor\Interfaces;


use LzoMedia\GroupsExtractor\Managers\ClientManager;

interface SocialExtractorInterface
{

    /**
     * @param $type
     * @return mixed
     */
    public function setSocialType(ClientManager $type);
    public function getSocialType();

}