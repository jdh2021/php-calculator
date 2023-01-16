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
    // often times people will set properties to private and then access by creating a public method
    protected $first="Jennifer";
    private $last="Hightower";
    private $age = "99";

    // classes let us assign values to properties when we create objects
    // don't need to assign a value w/i class itself
    public $name;
    public $eyeColor;
    public $state;

    // method
    public function setName($name) {
        // 'this' points to class we're inside of
        $this->name = $name;
    }

     // using properties from within class
     public function getName() {
        // references this class, this property (no $)
        return $this->name;
     }

    // constructor. use to assign values when object created/class instantiated
    public function __construct($name, $eyeColor, $state) {
        // $name is not a reference to property in line 19. it's a reference to the parameter in construct on line 29
        $this->name = $name;
        $this->eyeColor = $eyeColor;
        $this->state = $state;   
        echo "<br /> The class has been instantiated.";
    }

    // destructor. to clean up class or object, close off connections to database
    // triggered when object is no longer referenced or deleted, or at end of script
    public function __destruct() {
        echo "<br /> This is the end of the class.";
    }

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
