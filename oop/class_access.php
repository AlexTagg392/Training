<?php


class Cars {

    public $wheel_count = 4;
    private $door_count = 4;
    protected $seat_count = 4;

    function car_detail() {
        echo $this->wheel_count;
        echo $this->seat_count;
        echo $this->door_count;
    }

}

$mercedes = new Cars();

echo $mercedes->wheel_count . "<br>";
//echo $mercedes->door_count . "<br>";
//echo $mercedes->seat_count . "<br>";

class Trucks extends Cars {

}

$tacoma = new Trucks();

echo $tacoma->wheel_count;


