<?php
    //Session is started
    session_start();
    //Checks if there is no variable in session then it executed.
    if (!isset($_SESSION['username']))
        {
            //As there is no session variable set it redirects to loginpage
            header("Location: loginpage.php?mess=log");
            //It ends the execution
            exit();
        }
    // Assign a value to $pagecss to link the css page.
    $pagecss = 'admindashboard.css';
    //includes(connect) the connection page.
    include "connection.php";
    //includes(connect) the connection page.
    include "navbar.php";
    // Assign a value to variable to select values from database
    $query_box = "SELECT * FROM company";
?>



<div class="Registered">
  <h2>No Of Compay Registered</h2>

  <div class="insideregistered">
    <h1><?php
        //Assign a value to variable $res.Its used to execute the query
        $res = mysqli_query($connection, $query_box);
        //A variable $rowcount is used to access the number of rows in the database.
        $rowcount = mysqli_num_rows($res);
        //Prints the number of rows in the database in a specific table.
        echo $rowcount;
        ?></h1>
  </div>
</div>


    <div class="Recentlyadded">
      <h2>Recently Added Companies</h2>
      <?php
        //Assign a value to variable to select values from database by limiting to 5 rows.
        $query = "SELECT * FROM company ORDER BY id DESC LIMIT 5";
        //checks if the variable $result has done the query to the database.
        if ($result = mysqli_query($connection, $query))
        {
            //Checks if the variable $result has one or more no rows in the database.
            if (mysqli_num_rows($result) > 0)
            {
                //Layout the table to display the information
                echo "<table>";
                echo "<tr>";
                echo "<th>Company Name</th>";
                echo "<th>Company Size</th>";
                echo "<th>Company Tags</th>";
                echo "<th>Comapny Website</th>";
                echo "<th>Company Email</th>";
                echo "<th>Company Phone</th>";
                echo "<th>Country</th>";
                echo "</tr>";
                //its used to fetch all the rows available in the database.
                while ($row = mysqli_fetch_array($result))
                {
                    //Layout the information in the table.
                    echo "<tr>";
                    echo "<td>" . $row['company_name'] . "</td>";
                    echo "<td>" . $row['company_size'] . "</td>";
                    echo "<td>" . $row['company_tags'] . "</td>";
                    echo "<td>" . $row['company_url'] . "</td>";
                    echo "<td>" . $row['company_email'] . "</td>";
                    echo "<td>" . $row['company_phone'] . "</td>";
                    echo "<td>" . $row['country'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                //It is used to free the memory assosiated with the result.
                mysqli_free_result($result);
            }
            else
            {
                // if the variable $result does not have any value it displays the error message.
                echo "No records matching your query were found.";
            }
        }
        else
        {
            //if the variable $result couldn't execute then it displays the error message.
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
      ?>
      <p><a href="existing_company.php">Load More</a>
    </div>
  </body>
</html>
