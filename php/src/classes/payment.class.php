<?php

// interfaces - blueprint to group classes together
interface PaymentInterface {
    // rules classes should follow to use interface. class must have method payNow
    public function payNow();
    public function paymentProcess();
}

interface LoginInterface {
    public function loginFirst();
}

// implements - keyword for classes to follow rules of interface
class Paypal implements PaymentInterface, LoginInterface {
    public function loginFirst() {}
    public function payNow() {}
    // handler to decide how process will run
    public function paymentProcess() {
        $this->loginFirst();
        $this->payNow();
    }
}

class BankTransfer implements PaymentInterface, LoginInterface {
    public function loginFirst() {}
    public function payNow() {}
    // handler to decide how process will run
    public function paymentProcess() {
        $this->loginFirst();
        $this->payNow();
    }
}


class Visa implements PaymentInterface {
    public function payNow() {}
    public function paymentProcess() {
        $this->payNow();
    }
}

class Cash implements PaymentInterface {
    public function payNow() {}
    public function paymentProcess() {
        $this->payNow();
    }
}

class BuyProduct {
    // method to use a class above. interface to reference three classes that could be passed in
    // refer to interface as type declaration
    public function pay(PaymentInterface $paymentType) {
        // reference properties and methods from all three classes inside method
        $paymentType->paymentProcess();

    }
}

$paymentType = new Cash(); 
$buyProduct = new BuyProduct();

$buyProduct->pay($paymentType);

?>