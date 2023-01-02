<html>
<head>
<title>PHP Calculator</title>
</head>
<body>
<!--Begin PHP with -->


<h1>PHP Calculator</h1>
<form>
    <input type="text" name="number_one" placeholder="first number">
    <input type="text" name="number_two" placeholder="second number">
    <select name="operator">
        <option></option>
        <option>+</option>
        <option>-</option>
        <option>*</option>
        <option>/</option>
    </select>
    <br />
    <button type="submit" name="submit" value="submit">Calculate</button>
</form>

<h4> Result is: </h4>
<?php
    // check if submit has been clicked
    if(isset($_GET['submit'])) {
        // create variables to store number_one and number_two from URL
        $number_one=$_GET['number_one'];
        $number_two=$_GET['number_two'];
        // create variable to store operator from URL
        $operator=$_GET['operator'];
    }

?>

</body>

</html>