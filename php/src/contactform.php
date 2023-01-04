
<?php

// check if 'send mail' button was clicked
if(isset($_POST['submit']) {
    // variables to store data user entered in form
    $name=$_POST['name'];
    $subject=$_POST['subject'];
    $mailFrom=$_POST['mail'];
    $message=$_POST['message'];

    $mailTo="jhightowermn@gmail.com"
    $headers="From: ".$mailFrom;
    // customized message
    $txt="You have received an email from ".$name.".\n\n".$message;

    // mail method parameters - receiving email address, subject of email, message of email, headers
    mail($mailTo, $subject, $txt, $headers);

})