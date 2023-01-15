<?php

// multiple classes can be combined within one file, although not best practice
// properties are similar to variables; methods are similar to functions
/* 
private - only access data from inside class
public - access data from outside class
protected - access data from w/i same class or any class that extends
*/

class Person {
    // private properties vs. protected properties
    protected $first="Jennifer";
    private $last="Hightower";
    private $age = "99";

    // public method
    public function owner() {
        // variable 'this' references data inside same class
        $a = $this->first;
        return $a;
    }
}

// inherit properties and methods from one class to another class using 'extends' and make properties 'protected'
class Pet extends Person {
    public function owner() {
        // variable this references data inside class
        $a = $this->first;
        return $a;
    }
}
