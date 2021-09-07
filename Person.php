<?php


class Person
{
    public $act;
    public $name;
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

   // for isset 屬性重載
    public function __isset($name)
    {
       echo "<br>__isset:".$name;
    }
    // for empty $name
    public function  __unset($name)
    {
       echo "<br>__unset:".$name;
    }

    public function __construct($age = 33)
    {

    }

    public static function  __callStatic($func,$args)
    {
        echo "<br>__callStatic:".$func;
    }

    public  function __call($func,$args)
    {
        if(method_exists($this,$func)){
            $args = implode(', ', $args);
            $this->$func($args[0]);
        }
    }

    public static function myCallbackMethod()
    {
        return 'Hello World!';
    }

    function fetchClassName()
    {
        return static::class;
    }

    function __invoke()
    {

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