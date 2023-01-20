<?php

// inherit method from inside Visa class
class BuyProduct extends Visa {
    public function getPayment() {
        return $this->visaPayment();
    }
}