<?php
    // PHP is loose language; strict mode enforces strict types (1 is true; 0 is false)
    declare(strict_types =1);
    include 'includes/autoloader.inc.php';

?>

<html>
<head>
<title>PHP Projects</title>
</head>
<body>
<!--procedural PHP calculator -->
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

<!-- PHP OOP Calculator -->
<form action="includes/calc.inc.php" method="POST">
    <h2> PHP OOP Calculator </h2>
    <input type="number" name="num1" placeholder="First Number">
    <select name="operate">
        <option value="add">Add</option>
        <option value="subtract">Subtract</option>
        <option value="multiply">Multiply</option>
        <option value="divide">Divide</option>
    </select>
    <input type="number" name="num2" placeholder="Second Number">
    <button type="submit" name="submit">Calculate</button>
</form>

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

<h2>Create profile</h2>
<?php
    $name = "";
    $communication = "";
    $email = "";
    $birth_year = "";
    $validation_error = "";
    $existing_users = ["test1", "test2"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // use htmlspecialchars to avoid interpreting HTML, man-in-the-middle attack
        $raw_name = trim(htmlspecialchars($_POST["name"]));
        // check if $raw_name already exists as a username using in_array
        if(in_array($raw_name, $existing_users)) {
          $validation_error .= "This username is already taken." ;
        } else {
          // if username doesn't already exist, assign raw_name to name
          $name = $raw_name;
        }
        // check that radio selection isn't altered to a different value using in_array
        $raw_communication = $_POST["communication"];
        if (in_array($raw_communication, ['email', 'phone', 'text'])) {
            $communication = $raw_communication;
          } else {
            $validation_error .= "You must select email, phone, or text.";
          }
        // check that email is valid
        $raw_email = $_POST["email"];
        if (filter_var($raw_email, FILTER_VALIDATE_EMAIL)){
            $email = $raw_email;
          } else {
            $validation_error .= "Please enter a valid email.";
          } 
        $raw_birth_year = $_POST["birth_year"];
        // range to restrict birth years entered by user with options
        $options = ["options" => ["min_range" => 1915, "max_range" => date("Y")]];
        // check that integer entered by user is between 1915 and current year
        if (filter_var($raw_birth_year, FILTER_VALIDATE_INT, $options)) {
            $birth_year = $raw_birth_year;
          } else {
            $validation_error .= "Please enter a valid birth year.";
          }
      }
?>
    <form method="post" action="">
        <p>
            Enter a username: <input type="text" name="name" value="<?php echo $name;?>" >
        </p>
        <p>
            Select a preferred contact method:
            <input type="radio" name="communication" value="email" <?php echo ($communication=='email')?'checked':'' ?>> Email
            <input type="radio" name="communication" value="phone" <?php echo ($communication=='phone')?'checked':'' ?>> Phone
            <input type="radio" name="communication" value="text" <?php echo ($communication=='text')?'checked':'' ?>> Text
        </p>
        <p>
            Enter your email:
            <input type="text" name="email" value="<?php echo $email;?>" >
        </p>
        <p>
            Enter your birth year:
            <input type="text" name="birth_year" value="<?php echo $birth_year;?>">
        </p>
        <p>
        <span style="color:red;"><?= $validation_error;?></span>
        </p>
        <input type="submit" value="submit">
    </form>
  
<h2>Preview:</h2>
    <p>
    Username: <?=$name;?>
    </p>
    <p>
    Communication Preference: <?=$communication;?>
    </p>
    <p>
    Email: <?=$email;?>
    </p>
    <p>
    <!-- conditionally render empty string or age-->
    Age: <?=($birth_year==="")? "" : date("Y")-$birth_year;?>
    </p>

<h2>PHP OOP</h2>

<!--need to instantiate class first -->
<?php 
    // create object first before able to use class (instantiate class)
    // object is copy of class. class is template for objects
    
    // $person1 = new Person();
    // $person1->setName("Jen");
    // echo $person1->name;

    // $person2 = new Person();
    // $person2->setName("Joan");
    // echo $person2->name;

    // parentheses needed for instantiating with constructor when parameters must be passed in
    $person1 = new Person\Person("Janet", "Brown", "Alaska");
    echo "<br /> $person1->name";
    echo "<br /> $person1->eyeColor ";
    // can still change name using method
    $person1->setName("Jordan");
    echo "<br /> $person1->name";


    try {
        // $person1->setName(2);
        $person1->setName('Joaquin');
        echo "<br />" . $person1->getName();
    } catch (TypeError $error) {
        echo "<br /> Error: " . $error->getMessage();
    }

    // $person2 = new Person("Joan", "Green", "New York");
    // // unset destroys object, triggers destructor
    // unset($person2);
    // echo "<br /> $person2->name";


    // access static properties w/o needing to create an object from class
    // variable symbol needed since not a property of object
    // :: to access static properties
    echo "<br />";
    echo Person\Person::$drinkingAge;
    Person\Person::setDrinkingAge(18);
    echo "<br />";
    echo Person\Person::$drinkingAge;

   // can access static properties from non-static, regular methods
    echo "<br />";
    echo $person1->getDA();


?>

</body>

</html>