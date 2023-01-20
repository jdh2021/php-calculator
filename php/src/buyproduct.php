<?php
    include_once "abstract/paymenttypes.abstract.php";
    include_once "classes/buyproduct.class.php";

    $buyProduct = new BuyProduct();
    echo $buyProduct->getPayment();

?>
