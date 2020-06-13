<?php
    //Sessions is started
    session_start();
    //checks that sessios doesnt have any variable.
    if (!isset($_SESSION['username']))
    {
        //Redirects to the loginpage with an error.
        header("Location: loginpage.php?mess=log");
        //It end its execution if this happens.
        exit();
    }
    //Sets the variable to $pagecss so navbar head could have the css page linked.
    $pagecss = 'existing_company.css';
    //Includes the navbar page.
    include "navbar.php";
    //inccludes the connection page.
    include "connection.php";
    //Set query to the database in a variable $result.
    $result = mysqli_query($connection, "SELECT * FROM company ORDER BY id DESC ");
?>
<div class="Recentlyadded">
   <h2>Recently Added Companies</h2>
        <table width="100%" border>
            <tr bgcolor='white'>
                <td>Update</td>
                <td>Company Name</td>
                <td>Company Size</td>
                <td>Company Tag</td>
                <td>Company URL</td>
                <td>Company Email</td>
                <td>Company Phone</td>
                <td>Country</td>
                <td>Description</td>
            </tr>
        <?php
            //when there is a result from the query it fetch the assosiated rows
            while ($res = mysqli_fetch_array($result))
            {
                //Prints out the information accordingly.
                echo "<tr>";
                echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                echo "<td>" . $res['company_name'] . "</td>";
                echo "<td>" . $res['company_size'] . "</td>";
                echo "<td>" . $res['company_tags'] . "</td>";
                echo "<td>" . $res['company_url'] . "</td>";
                echo "<td>" . $res['company_email'] . "</td>";
                echo "<td>" . $res['company_phone'] . "</td>";
                echo "<td>" . $res['country'] . "</td>";
                echo "<td>" . $res['company_description'] . "</td>";

            }
            ?>
        </table>
</div>
</body>
</html>

