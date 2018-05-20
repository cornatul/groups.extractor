<?php
/**
 * Created by PhpStorm.
 * User: lzomedia
 * Date: 19.05.2018
 * Time: 20:22
 */


namespace LzoMedia\GroupsExtractor\Social\Google\Extractors;



class NewsExtractor
{

    protected $language = "ro";

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }


    /**
     * @param string $language
     */
    public function setLanguage(string $language): void
    {
        $this->language = $language;
    }



}