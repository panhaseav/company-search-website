<?php
    //Inputs the connection credentials detail to variables
    $username = "s5107880";
    $password = "ih9NrhoJzATKkVkER4frAvuybsj7YeRh";
    $host = "db.bucomputing.uk";
    $port = 6612;
    $database = $username;
    //Initialise the connection.
    $connection = mysqli_init();
    //Check that initialising has failed or not.
    if (!$connection)
    {
        //Prints out the error message.
        echo "Initalising MySQLi failed";
    }
    else
    {
        // Establish secure connection using SSL for use with MySQLi.
        mysqli_ssl_set($connection, NULL, NULL, NULL, '/public_html/sys_tests', NULL);

        // Connect the MySQL connection.
        mysqli_real_connect($connection, $host, $username, $password, $database, $port, NULL, MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT);
        //Checks thats is there any error while connecting
        if (mysqli_connect_errno())
        {
            //Prints the connection error
            echo "<p>Failed to connect to MySQL. " . "Error (" . mysqli_connect_errno() . "): " . mysqli_connect_error() . "</p>";
        }
    }
?>

