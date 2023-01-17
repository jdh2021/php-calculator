<?php
    //built-in function that looks for new instantiated class
    // spl_autoload_register
    // pass function inside parentheses
    spl_autoload_register('myAutoLoader');

    //user-defined function
    function myAutoLoader($className) {
        // pass in a variable as soon as new instance of a class is created
        $path = "classes/";
        $extension =".class.php";
        $fullPath = $path . $className . $extension;

        // checks if file (or class) was found
        if(!file_exists($fullPath)) {
            return false;
        }
        include_once $fullPath;

    }
?>