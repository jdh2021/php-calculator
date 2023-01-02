<html>
<head>
<title>PHP Calculator</title>
</head>
<body>
<!--Begin PHP with -->

<?php

echo 'PHP Calculator<br />';


//End PHP with
?>

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



</body>

</html>