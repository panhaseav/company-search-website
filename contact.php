<?php include "navigation.php";?>
<?php include "connection.php";?>

<?php
global $connection;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet"  href="./css/bootstrap.css">
    <style>
        .navbar {
            background:white;
        }
        body{
            background-color:rgba(48, 119, 108, 0.83);
            background-size:cover;
            margin:auto;
        }
        html {
            height : 100%
        }
.searchbutton{
    margin-top:9px;
padding:auto;
}
h1{
    padding-left:10px;
}
p{
    padding-left:18px;
}

.box{ 
     background-color: white; 
     padding: 100px; 
}
.mess{
color:green;
font-size: 15px;
font-weight: bold;
}	


    </style>
</head>
<center><h1> How to contact us </h1></center>

<?php

if($_POST["submit"]) {

    $recipient="s5112929@bournemouth.ac.uk";

    $subject="Form to email message";

    $sender=$_POST["sender"];

    $senderEmail=$_POST["senderEmail"];

    $message=$_POST["message"];

    $mailBody="Name: $sender\nEmail: $senderEmail\n\n$message";

    mail($recipient, $subject, $mailBody, "From: $sender <$senderEmail>");

    $thankYou="<p class='mess'>Thank you! Your message has been sent. We will aim to respond to your email within three working days.</p>";

}
?><!DOCTYPE html>
 
<html>

<head>

    <meta charset="utf-8">

    <title>Contact form to email</title>

<center><b><p>Please enter your details and query in the appopriate boxes below.</p></b></center>

</head>
 
<body>

<div class="box">

    <?=$thankYou ?>

    <form method="post" action="contact.php">

        <label>Full name</label><br>

        <input name="sender"><br>

        <label>Email address</label><br>

        <input name="senderEmail"><br>

        <label>Message</label> <br>

        <textarea rows="5" cols="20" name="message"></textarea><br><br>

        <input type="submit" name="submit">

    </form>

</div>
 
</body>


</html>

