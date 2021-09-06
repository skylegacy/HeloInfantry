<?php


abstract class DomainObject
{
    private $road;
    public static function create(){
        return new static();
    }

    public function __construct(){
        $this->road = static::resetRoad();
    }

    public static function resetRoad(){
        return "to Htc";
    }

    public function callRoad(){
        return $this->road;
    }
}

