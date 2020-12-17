<?php

    function __autoLoad($class) {

        $class = strtolower($class);
        $the_path = "includes/{$class}.php";

            if(file_exists($the_path)) {
                include($the_path);

            } else {

                die("This file named {$class}.php was not found...");
            }
    }

