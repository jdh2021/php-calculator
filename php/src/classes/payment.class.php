<?php

// interfaces - blueprint to group classes together
interface PaymentInterface {
    // rules classes should follow to use interface. class must have method payNow
    public function payNow();
}

// implements - keyword for classes to follow rules of interface
class Paypal implements PaymentInterface {
    public function payNow() {}
}

class Visa implements PaymentInterface {
    public function payNow() {}
}

class Cash implements PaymentInterface {
    public function payNow() {}
}

class BuyProduct {
    // method to use a class above. use one keyword to reference three classes
    public function pay(PaymentInterface $paymentType) {
        // reference properties and methods from all three classes inside method
        $paymentType->payNow();

    }
}

$paymentType = new Cash(); 
$buyProduct = new BuyProduct();

$buyProduct->pay($paymentType);
?>