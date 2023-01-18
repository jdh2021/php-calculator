<?php

class Calc {
    // create properties first - no values set
    public $operator;
    public $num1;
    public $num2;

    // use constructor method to assign values of properties
    // what is passed into construct function are not properties above, they're the data passed from user inside form
    public function __construct(string $oper, int $one, int $two) {
        // this is directed to properties above and assign value of what was passed in
        $this->operator = $oper;
        $this->num1 = $one;
        $this->num2 = $two;
    }

    public function calculate() {
        switch($this->operator) {
            case 'add':
                $result = $this->num1 + $this->num2;
                return $result;
                break;
            case 'subtract':
                $result = $this->num1 - $this->num2;
                return $result;
                break;
            case 'multiply':
                $result = $this->num1 * $this->num2;
                return $result;
                break;
            case 'divide':
                $result = $this->num1 / $this->num2;
                return $result;
                break;
            default:
                echo "There\'s an error";
                break;
        }
    }
}
