<?php

// abstract class only gets used when another class needs something from it
abstract class Visa {
    public function visaPayment() {
        return "Process a VISA payment";
    }
    // abstract function can't be added to non-abstract class
    // if any class extends to abstract class, that class has to include getPayment method
    // ensures methods get named properly
    abstract public function getPayment();
}

