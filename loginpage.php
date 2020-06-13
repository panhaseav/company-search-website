<!DOCTYPE html>
<html>
   <head>
      <title>Login Form Design</title>
      <link rel="stylesheet" type="text/css" href="loginpage.css">
   <body>
      <div class="loginbox">
         <img src="https://pbs.twimg.com/profile_images/1061906789300609024/v1lmHZph_400x400.jpg" alt="profile" class="avatar">
         <h1>Users Login <a href=""></a></h1>
         <form action="loginprocess.php" method="POST">
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username" >

            <?php
                //checks wether a variable is set for error .
                if(isset($_GET['error'])){
                    if($_GET['error'] == "both" || $_GET['error'] == "usrempty"){
                        //print the message if one of the codition above is true.
                        echo "<p class = 'error' >Username Field is empty Try Again</p><br>";
                    }
                }
               ?>

            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" >

            <?php
                //checks wether a variable is set for error.
                if(isset($_GET['error'])){
                    if($_GET['error'] == "both" || $_GET['error'] == "passempty"){
                        //print the message if one of the codition above is true.
                        echo "<p class = 'error'>Password Field is empty Try Again</p><br>";
                   }
               }
               ?>

            <input type="submit" name='login' >

            <?php
                //checks wether a variable is set for error.
                if(isset($_GET['error'])){
                    if($_GET['error'] == "InvalidEntry"){
                        //print the message if the codition above is true.
                        echo "<p class = 'error' >Invalid Entry Please try Again</p>";
                   }
                }
                //checks wether a variable is set for mess.
                if(isset($_GET['mess'])){
                    if($_GET['mess'] == "log"){
                       //print the message if the codition above is true.
                       echo "<p class= 'error' >Please login to gain access</p>";
                   }
               }
               ?>

         </form>
      </div>
   </body>
   </head>
</html>

