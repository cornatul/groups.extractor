<?php
/**
 * Created by PhpStorm.
 * User: lzo
 * Date: 27/04/17
 * Time: 19:57
 */

namespace LzoMedia\GroupsExtractor\Interfaces;


use LzoMedia\GroupsExtractor\Classes\App;
use LzoMedia\GroupsExtractor\Classes\Processor;
use LzoMedia\GroupsExtractor\Classes\Type;

interface ExtractorInterface
{


    public function setApp(App $app);

    public function setType(Type $type);

    public function process(Processor $processor);


}