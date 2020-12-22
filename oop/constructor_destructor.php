<?php


class Cars {

    public $wheel_count = 4;
    static $door_count = 4;


    function __construct() {
        echo $this->wheel_count;
        echo " ";
        echo self::$door_count++;

    }

}

$mercedes = new Cars();

echo "<br>";

$bmw = new Cars();


//class Trucks extends Cars {
//
//}
//
//$tacoma = new Trucks();
//
//echo $tacoma->wheel_count;


