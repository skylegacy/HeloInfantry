<?php

require 'DomainObject.php';
require 'Person.php';

class User extends DomainObject {}

class Sky extends Person {

}

$skyDuty = new Sky;

$skyDuty->name = "SkyLine";
$skyDuty->act = "goto";

$myuser = User::create();
$road = $myuser->callRoad();

echo "<br>".$skyDuty->name." {$skyDuty->act} ". $road;

echo $skyDuty->fighterLife("jojo");