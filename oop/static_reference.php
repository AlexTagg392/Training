<?php


class Cars {

    static $wheel_count = 4;
    static $door_count = 4;


    static function car_detail() {
        return self::$wheel_count . "<br>";

    }

}
class Trucks extends Cars {

    static function display() {
        echo parent::car_detail();
    }
}

Trucks::display();


//$mercedes = new Cars();
//
////echo $mercedes->wheel_count . "<br>";
//echo Cars::$door_count . " THIS ONE" . "<br>";
//echo Cars::car_detail();




