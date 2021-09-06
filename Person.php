<?php


class Person
{
    private $act;
    private $name;
    private $age;

    function __get($property)
    {
        $property = ucfirst($property);
        $method = "get{$property}";
//        echo "<br>ecec {$method}";
        if (method_exists($this, $method)) {
            return $this->$method();
        }
    }

    function __set($property, $value)
    {
        $property = ucfirst($property);
        $method = "set{$property}";
//        echo "<br>ecec {$method}";
        if (method_exists($this, $method)) {
            return $this->$method($value);
        }
    }

    /*
     * todo: __unset() , __isset()
     */


    public function __construct($age = 33)
    {
        $this->age  = $age;
    }


    function __call($func,$args){
        if(method_exists($this,$func)){
            $args = implode(', ', $args);
            $this->$func($args[0]);
        }
    }

    function getName()
    {
        return $this->name;
    }

    function setName($newName)
    {
        $this->name = $newName;
    }

    function getAct()
    {
        return $this->act;
    }

    function setAct($newAct)
    {
        $this->act = $newAct;
    }

    function fighterLife($str)
    {
        return "<br>skyopps! {$str}";
    }
}