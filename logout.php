<?php
    // Session begins.
    session_start();
    // variables are put into an array
    $_SESSION = array();
    // Sessions are destroyed
    session_destroy();
    //redirected to home page.So the user is logged out because the session was completly destroyed.
    header("Location: home.php");
?>
