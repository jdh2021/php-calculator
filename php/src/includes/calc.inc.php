<?php
    // calc.inc runs after form is submitted
    declare(strict_types = 1);
    include 'autoloader.inc.php';

    // retrieve data from form
    $operate = $_POST["operate"];
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];

    // create an object of class calc
    // cast num1 and num2 as integers
    $calculation = new Calc($operate, (int)$num1, (int)$num2);

    try {
         // run method on created object
        echo $calculation ->calculate();

    } catch (TypeError $error) {
        echo "There\'s an error:" . $error->getMessage();
    }
?>