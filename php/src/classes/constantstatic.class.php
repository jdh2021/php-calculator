<?php
class FirstClass {
    // capitalize constants
    // use scope resolution operator :: to access constant (similar to static)
    const EXAMPLE ="<br />This is a constant within FirstClass.";

    public static function test() {
        $test = "<br />This is a test static method.";
        return $test;
    }

}

echo "<span>FirstClass Static, Constant Test</span>";
$constantDemo = FirstClass::EXAMPLE;
echo $constantDemo;
$staticMethod = FirstClass::test();
echo $staticMethod;

echo "<br />";

// inherit properties and methods from first class. constants and statics can't be referenced in same way
class SecondClass extends FirstClass {
    public static $staticProperty = "<br />This is a static within SecondClass.";
    
    public static function secondTest() {
        // reference to constant or static inside class that inherits from another class using "parent"
        echo parent::EXAMPLE;
        // reference to static within same class using "self"
        echo self:: $staticProperty;
    }
}

echo "<span>SecondClass Static, Constant Test</span>";
$secondClassStatic = SecondClass::$staticProperty;
echo $secondClassStatic;
$inheritedStaticTest = SecondClass::secondTest();

?>