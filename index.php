<?php

use baseModel\DomainTest;

require 'DomainTest.php';
require 'Person.php';

class User extends DomainTest {}

class Sky extends Person {}

$skyDuty = new Sky;

$skyDuty->name = "SkyLine";
$skyDuty->act = "goto";

$myuser = User::create();
$road = $myuser->callRoad();

echo "<br>".$skyDuty->name." {$skyDuty->act} ". $road;

echo $skyDuty->fighterLife("jojo");


echo "<br>exist age property:".isset($skyDuty->age);
unset($skyDuty->age);
echo "<br>unset age property:";
echo "<br>".$skyDuty->fetchClassName();
echo "<br>className";
echo "<br>mycallBack:".call_user_func([$skyDuty,'myCallbackMethod']);