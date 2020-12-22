<?php


class Cars {

    static $wheel_count = 4;
    static $door_count = 4;


    static function car_detail() {
        echo Cars::$wheel_count . "<br>";
        echo Cars::$door_count;
    }

}

$mercedes = new Cars();

//echo $mercedes->wheel_count . "<br>";
echo Cars::$door_count . " THIS ONE" . "<br>";
echo Cars::car_detail();

//class Trucks extends Cars {
//
//}
//
//$tacoma = new Trucks();
//
//echo $tacoma->wheel_count;


