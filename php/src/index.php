<html>
<head>
<title>PHP Calculator</title>
</head>
<body>
<!--Begin PHP with -->


<h1>PHP Basic Calculator</h1>
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
        $number_two=$_GET['number_twqo'];
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

</body>

</html>