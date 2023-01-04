<html>
<head>
<title>PHP Projects</title>
</head>
<body>
<!--Begin PHP with -->

<h2>PHP Basic Calculator</h2>
<form method="get">
    <input type="text" name="number_one" placeholder="first number">
    <select name="operator">
        <option>+</option>
        <option>-</option>
        <option>*</option>
        <option>/</option>
    </select>
    <input type="text" name="number_two" placeholder="second number">
    <br />
    <button type="submit" name="submit" value="submit">Calculate</button>
</form>

<h4> Result is: </h4>
<?php
    // check if submit has been clicked
    if (isset($_GET['submit'])) {
        // create variables to store number_one and number_two from URL
        $number_one=$_GET['number_one'];
        $number_two=$_GET['number_two'];
        // create variable to store operator from URL
        $operator=$_GET['operator'];
        // switch statement with case 
        switch($operator) {
            case "+":
                echo $number_one + $number_two;
            break;
            case "-":
                echo $number_one - $number_two;
            break;
            case "*":
                echo $number_one * $number_two;
            break;
            case "/":
                echo $number_one / $number_two;
            break;
        }
    }

?>

<h2>PHP Contact Form</h2>
    <p>Send Email</p>
    <form class="contact-form" action="contactform.php" method="post">
    <input type="text" name="name" placeholder="Full Name">
    <input type="text" name="mail" placeholder="Your Email">
    <input type="text" name="subject" placeholder="Your Subject">
    <textarea name="message" placeholder="Message"></textarea>

</body>

</html>