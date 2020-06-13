<?php
    //Iclude the navbar file
    include "navbar.php";
    //includes the connection file
    include "connection.php";

    //getting id of the data from url
    $id = $_GET['id'];

    //deleting the row from table
    $result = mysqli_query($connection, "DELETE FROM company WHERE id=$id");

    //redirecting to the existing_company page.
    header("Location:existing_company.php");
    
?>
