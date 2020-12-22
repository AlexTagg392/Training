<?php

    echo __FILE__ . "<br>";

    echo __LINE__ . "<br>";

    echo __DIR__ . "<br>";

    echo "<br>";


    if(file_exists(__DIR__)) {
        echo "YES: " . "File exists" . "<br>";
    }

    echo "<br>";

    if(is_file(__DIR__)) {
        echo "YES" . "Is a File" . "<br>";
    } else {
        echo "NO: " . "Is Not a File" . "<br>";
    }

    echo "<br>";

    if(is_file(__FILE__)) {
        echo "YES: " . "Is a File" . "<br>";
    } else {
        echo "NO" . "Is Not a File" . "<br>";
    }

    echo "<br>";

    if(is_dir(__DIR__)) {
        echo "YES: " . "Is a Directory" . "<br>";
    } else {
        echo "NO: " . "Is Not a Directory" . "<br>";
    }

    echo "<br>";

    if(is_dir(__FILE__)) {
        echo "YES: " . "Is a Directory" . "<br>";
    } else {
        echo "NO: " . "Is Not a Directory" . "<br>";
    }

    echo "<br>";

    echo file_exists(__FILE__) ? "YES" : "NO";

?>

