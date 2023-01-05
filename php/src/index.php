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
        <button type="submit" name="submit">Send Mail</button>
    </form>

<h2>Functions with Regular Expressions</h2>
<?php 
    $string="String: Testing functions using regular expressions. There are two instances of \"expressions\".";
    echo $string;
    echo "<br />";
    // first parameter is what we want to search for, second parameter is string to search
    if(preg_match("/expressions/", $string)) {
        echo "A match was found";
    }
    echo "<br />";
    // inserts all results from string into array
    if(preg_match_all("/expressions/", $string, $array)) {
        print_r($array);
    }
    echo "<br />";
    // preg_replace replaces characters in string with another set of characters
    $replaced_string=preg_replace("/expressions/", "PHP", $string);
    echo $replaced_string;

    // search for specific character or other character with |
    echo "<br />";
    echo preg_match("/(y|s)/", $string);
    // search for any of multiple characters with []
    echo "<br />";
    echo preg_match("/[ghi]/", $string);
    // search for characters that are not those listed with ^
    echo "<br />";
    echo preg_match("/[^ghi]/", $string);
    // search for range with [] and -
    echo "<br />";
    echo preg_match("/[a-z]/", $string);
    echo "<br />";
    echo preg_match("/[0-9]/", $string);
    // search for quantifiers, * searches for 0 or more and returns 0 or 1 boolean
    echo "<br />";
    echo preg_match("/T*/", $string);
    echo "<br />";
    /* 
    inserts all characters that come after T into array. T shows where to start. 
    . to indicate all characters. Letter after * to indicate stopping character
    "*" indicates 0 or more
    */
    preg_match_all("/T.*n/", $string, $array);
    print_r($array);
    echo "<br />";
    // + searchig for at least one character
    preg_match_all("/T+/", $string, $array);
    print_r($array);
    echo "<br />";
    // start at 1, any character after than until get to final "2"
    // * is greedy quantifier
    preg_match_all("/1.*2/", $string, $array);
    print_r($array);
    // ? is lazy quantifier
    echo "<br />";
    preg_match_all("/1.*?2/", $string, $array);
    print_r($array);
    /* {} to search for quantity of characters in a row, commas to search for 1 OR 2 (no spaces)
    */
    echo "<br />";
    preg_match_all("/T{1,2}/", $string, $array);
    print_r($array);

    // character classses
    /* search \s (white-space character), \S (non white-space character), \d (digit character), \D (non-digit character),
    \w (word character), \W (non-word chracter)
    */
    echo "<br />";
    echo preg_match("/\s{3}/", $string, $array);

    // anchors 
    echo "<br />";
    // ^ if string starts with a specific character
    echo preg_match("/^S/", $string);
    // $ after if string ends with a specific character
    echo "<br />";
    echo preg_match("/.$/", $string);
    echo "<br />";
    // if string starts with S and ends with . ".*" to grab all characters after S
    echo preg_match("/^S.*.\.$/", $string);
?>


</body>

</html>