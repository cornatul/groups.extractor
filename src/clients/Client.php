<?php


/**
 * Created by PhpStorm.
 * User: lzo
 * Date: 27/04/17
 * Time: 21:03
 */


namespace LzoMedia\GroupsExtractor\Clients;



use LzoMedia\GroupsExtractor\Classes\App;
use LzoMedia\GroupsExtractor\Classes\Processor;
use LzoMedia\GroupsExtractor\Classes\Type;
use LzoMedia\GroupsExtractor\Interfaces\ExtractorInterface;

class Client implements ExtractorInterface
{

    public $app;

    public $type;


    public $processor;

    /**
     * @return mixed
     */
    public function getProcessor()
    {
        return $this->processor;
    }


    /**
     * @param mixed $processor
     */
    public function setProcessor($processor)
    {
        $this->processor = $processor;
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
    public function getApp()
    {
        return $this->app;
    }


    /**
     *
     */
    public function process(Processor $processor)
    {
        // TODO: Implement process() method.




        $processor->setType($this->type);

        $processor->setApp($this->app);



    }


    public function setApp(App $app)
    {
        // TODO: Implement setApp() method.
        $this->app = $app;

    }

    public function setType(Type $type)
    {
        // TODO: Implement setType() method.
        $this->type = $type;
    }
}