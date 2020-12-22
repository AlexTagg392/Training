<?php


class Cars {

    var $wheels = 4;

    function greeting() {
        return "Hello";
    }

}

$mercedes = new Cars();


class Trucks extends Cars {

}

$tacoma = new Trucks();

echo $tacoma->wheels;


