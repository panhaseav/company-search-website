<?php
    //Sessions is started
    session_start();
    //checks that sessios doesnt have any variable.
    if (!isset($_SESSION['username']))
    {
        //Redirects to the loginpage with an error.
        header("Location: loginpage.php?mess=log");
        exit();
    }
    ?>
<!DOCTYPE html>
<html>
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="navbar.css">
      <?php
         // is the variable $pagecss is not empty go n the statement.
         if(!empty($pagecss)){
             //print out the link reference in the header of the file results regarding the variable $pagecss.
             echo "<link rel='stylesheet' type='text/css' href='".$pagecss."'>";
         }
         ?>
   </head>
   <body>
      <div class="topnav">
      <ul>
         <div id="mySidenav" class="sidenav">
            <li><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></li>
            <li><a href="/wpassignment/admindashboard.php">Home</a></li>
            <li><a href="/wpassignment/createcompany.php">Register Company</a></li>
            <li><a href="/wpassignment/existing_company.php">Existing Company</a></li>
         </div>
         <div class="navigation">
            <a class="button" href="/wpassignment/logout.php">
               <img src="https://pbs.twimg.com/profile_images/378800000639740507/fc0aaad744734cd1dbc8aeb3d51f8729_400x400.jpeg">
               <div class="logout" >LOGOUT</div>
            </a>
         </div>
         <span color="#FFFAF0" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
         <li>
            <script>
               function openNav() {
                 document.getElementById("mySidenav").style.width = "250px";
               }
               
               function closeNav() {
                 document.getElementById("mySidenav").style.width = "0";
               }
            </script>
         </li>
      </ul>
      </div>
   </body>
</html>
